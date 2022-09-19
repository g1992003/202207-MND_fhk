
    document.querySelector('#btnbase64').addEventListener('change', handleFileSelect, false);

    $('input#btnbase64').change(function () {
        console.dir(this.files[0])
    })

    function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function(f) {
        if (!f.type.match("image.*")) return;
        var reader = new FileReader();
        reader.onload = function(e) {
            console.log(e);
            var base64 = e.target.result;
            document.getElementById("imgBase64").value = base64;
        };
        reader.readAsDataURL(f);
        });
    }
    function copybtn() {
        var copyText = document.getElementById("imgBase64");
        copyText.select();
        document.execCommand("copy");
        
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "複製完成";
    }

    function outcopy() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "複製";
    }
    function clearimg(){
        document.querySelector('#imgBase64').value = '';
        document.querySelector('#btnbase64').value = '';
    }
    $('#imgbase-Modal').on('hidden.bs.modal', function (e) {
        clearimg()
    })