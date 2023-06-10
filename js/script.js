var keyword = document.getElementById('keyword');
var TombolSearch = document.getElementById('tombol_search');
var container = document.getElementsByClassName('container');

keyword.addEventListener('keyup', function(){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', 'ajax/data_rincian_ajax.php?keyword=' + keyword.value, true);
    xhr.send();
});
