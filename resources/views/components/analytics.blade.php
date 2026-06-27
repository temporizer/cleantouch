<!--- Google Analytics via admin settings --->
@php($gaId = \App\Models\Setting::get('google_analytics_id'))
@if($gaId)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '{{ $gaId }}');
</script>
@endif
