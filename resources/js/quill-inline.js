let changed = false;
let saveBtn = null;
let statusEl = null;
let toolbarEl = null;
let activeEditor = null;

document.addEventListener('DOMContentLoaded', () => {
    if (!window.__editable) return;

    saveBtn = document.createElement('button');
    saveBtn.textContent = 'Save Changes';
    Object.assign(saveBtn.style, {
        position: 'fixed', bottom: '24px', right: '24px', zIndex: '9999',
        padding: '12px 24px', background: '#059669', color: '#fff',
        border: 'none', borderRadius: '8px', cursor: 'pointer',
        fontFamily: '"IBM Plex Mono", monospace', fontSize: '14px',
        fontWeight: '600', letterSpacing: '1px', textTransform: 'uppercase',
        boxShadow: '0 4px 12px rgba(0,0,0,0.25)', display: 'none',
    });
    saveBtn.addEventListener('mouseenter', () => saveBtn.style.background = '#047857');
    saveBtn.addEventListener('mouseleave', () => saveBtn.style.background = '#059669');
    saveBtn.addEventListener('click', saveContent);
    document.body.appendChild(saveBtn);

    statusEl = document.createElement('div');
    Object.assign(statusEl.style, {
        position: 'fixed', bottom: '80px', right: '24px', zIndex: '9999',
        padding: '8px 16px', borderRadius: '6px', fontFamily: '"IBM Plex Mono", monospace',
        fontSize: '12px', display: 'none',
    });
    document.body.appendChild(statusEl);

    toolbarEl = document.createElement('div');
    toolbarEl.id = 'inline-toolbar';
    Object.assign(toolbarEl.style, {
        position: 'fixed', display: 'none', zIndex: '10000',
        background: '#1f2937', borderRadius: '6px', padding: '4px',
        boxShadow: '0 4px 12px rgba(0,0,0,0.3)', gap: '2px',
    });
    toolbarEl.style.display = 'none';
    document.body.appendChild(toolbarEl);

    const buttons = [
        { label: 'B', cmd: 'bold', style: 'font-weight:bold;font-family:serif' },
        { label: 'I', cmd: 'italic', style: 'font-style:italic;font-family:serif' },
        { label: 'Link', cmd: 'link' },
    ];
    buttons.forEach(b => {
        const btn = document.createElement('button');
        btn.textContent = b.label;
        btn.setAttribute('data-cmd', b.cmd);
        Object.assign(btn.style, {
            background: 'transparent', color: '#fff', border: 'none',
            cursor: 'pointer', padding: '4px 10px', borderRadius: '4px',
            fontSize: '13px', fontFamily: '"IBM Plex Mono", monospace',
        });
        if (b.style) btn.style.cssText += ';' + b.style;
        btn.addEventListener('mouseenter', () => btn.style.background = '#374151');
        btn.addEventListener('mouseleave', () => btn.style.background = 'transparent');
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const cmd = btn.getAttribute('data-cmd');
            if (cmd === 'link') {
                const url = prompt('Enter URL:');
                if (url) document.execCommand('createLink', false, url);
            } else {
                document.execCommand(cmd, false, null);
            }
            toolbarEl.style.display = 'none';
            if (activeEditor) activeEditor.focus();
        });
        toolbarEl.appendChild(btn);
    });

    const els = document.querySelectorAll('[data-editable]');
    els.forEach(el => {
        const key = el.getAttribute('data-editable');
        if (!key) return;

        el.contentEditable = true;

        el.addEventListener('click', (e) => {
            if (el.closest('a')) e.preventDefault();
        });

        el.addEventListener('input', () => {
            changed = true;
            saveBtn.style.display = 'block';
        });

        el.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                el.blur();
            }
        });

        if (el.classList.contains('rich-editor')) {
            el.addEventListener('mouseup', (e) => {
                setTimeout(() => showToolbar(el), 10);
            });
            el.addEventListener('blur', () => {
                setTimeout(() => {
                    if (!toolbarEl.contains(document.activeElement)) {
                        toolbarEl.style.display = 'none';
                    }
                }, 200);
            });
        }
    });

    document.addEventListener('mousedown', (e) => {
        if (toolbarEl && !toolbarEl.contains(e.target)) {
            const editor = e.target.closest('.rich-editor');
            if (!editor) {
                toolbarEl.style.display = 'none';
            }
        }
    });
});

function showToolbar(el) {
    const sel = window.getSelection();
    if (!sel || sel.isCollapsed || !sel.toString().trim()) {
        toolbarEl.style.display = 'none';
        return;
    }
    const range = sel.getRangeAt(0);
    const rect = range.getBoundingClientRect();
    if (!rect || rect.width === 0) {
        toolbarEl.style.display = 'none';
        return;
    }

    activeEditor = el;

    const toolbarWidth = 180;
    let left = rect.left + rect.width / 2 - toolbarWidth / 2;
    let top = rect.top - 44;

    if (left < 10) left = 10;
    if (top < 10) top = rect.bottom + 10;

    toolbarEl.style.left = left + 'px';
    toolbarEl.style.top = top + 'px';
    toolbarEl.style.display = 'flex';
}

function saveContent() {
    const defaultSlug = document.querySelector('meta[name="page-slug"]')?.getAttribute('content');
    if (!defaultSlug) return;

    saveBtn.textContent = 'Saving...';
    saveBtn.style.opacity = '0.6';

    const groups = {};
    document.querySelectorAll('[data-editable]').forEach(el => {
        const key = el.getAttribute('data-editable');
        if (!key) return;
        const slug = el.closest('[data-editable-slug]')?.getAttribute('data-editable-slug') || defaultSlug;
        if (!groups[slug]) groups[slug] = {};
        groups[slug][key] = el.innerHTML;
    });

    const slugs = Object.keys(groups);
    let completed = 0;
    let hasError = false;

    slugs.forEach(slug => {
        fetch(`/admin/page-content/${slug}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
            },
            body: JSON.stringify(groups[slug]),
        })
        .then(r => r.json())
        .then(res => {
            completed++;
            if (!res.success) hasError = true;
            if (completed === slugs.length) finishSave(hasError);
        })
        .catch(() => {
            completed++;
            hasError = true;
            if (completed === slugs.length) finishSave(hasError);
        });
    });
}

function finishSave(hasError) {
    if (hasError) {
        showStatus('Error saving', '#dc2626');
    } else {
        showStatus('Saved!', '#059669');
        saveBtn.style.display = 'none';
        changed = false;
    }
    saveBtn.textContent = 'Save Changes';
    saveBtn.style.opacity = '1';
}

function showStatus(msg, color) {
    statusEl.textContent = msg;
    statusEl.style.background = color;
    statusEl.style.color = '#fff';
    statusEl.style.display = 'block';
    setTimeout(() => { statusEl.style.opacity = '0'; }, 2000);
    setTimeout(() => {
        statusEl.style.display = 'none';
        statusEl.style.opacity = '1';
    }, 2500);
}
