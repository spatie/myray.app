<script>
    var label = "Download free trial";
    var downLoadLink = "{{ $downloadLinkMacIntel }}";

    if (navigator.appVersion.indexOf("Win") !== -1) {
        label = 'Download free trial <span class="text-xs opacity-75">for <i class="fab fa-windows"></i></span>'
        downLoadLink = "{{ $downloadLinkWindows }}";
    }

    if (navigator.appVersion.indexOf("Mac") !== -1) {
        label = 'Download free trial <span class="text-xs opacity-75">for  <i class="fab fa-apple"></i></span>'
        downLoadLink = "{{ $downloadLinkMacIntel }}";
    }

    if (navigator.appVersion.indexOf("Linux") !== -1) {
        label = 'Download free trial <span class="text-xs opacity-75">for  <i class="fab fa-linux"></i></span>'
        downLoadLink = "{{ $downloadLinkLinux }}";
    }

    document.querySelectorAll("[data-role='download-label']").forEach(function(node) {
        node.innerHTML = label;
    });

    document.querySelectorAll("[data-role='download-link']").forEach(function(node) {
        node.href = downLoadLink;
    });
</script>
