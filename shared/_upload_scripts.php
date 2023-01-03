<link rel="stylesheet" href="css/filepond.min.css" />
<link rel="stylesheet" href="css/filepond-plugin-image-preview.css" />
<script src="js/filepond.min.js"></script>
<script src="js/filepond-plugin-image-preview.min.js"></script>
<script src="js/filepond-plugin-file-validate-size.js"></script>
<script src="js/filepond-plugin-file-validate-type.js"></script>
<script src="js/filepond-plugin-image-exif-orientation.js"></script>
<script src="js/filepond.jquery.js"></script>


<script>
// prettier-ignore
[
{supported: 'Symbol' in window, fill: 'https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js'},
{supported: 'Promise' in window, fill: 'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js'},
{supported: 'fetch' in window, fill: 'https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js'},
{supported: 'CustomEvent' in window && 'log10' in Math && 'sign' in Math &&  'assign' in Object &&  'from' in Array &&
            ['find', 'findIndex', 'some', 'includes'].reduce(function(previous, prop) { return (prop in Array.prototype) ? previous : false; }, true), fill: 'https://unpkg.com/filepond-polyfill/dist/filepond-polyfill.js'}
].forEach(function(p) {
if (p.supported) return;
document.write('<script src="' + p.fill + '"><\/script>');
});

// First register any plugins for filepond
$.fn.filepond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType
    );
</script>