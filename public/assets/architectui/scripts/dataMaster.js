let selectSatker = document.querySelector('#satker');
    let selectBagian = document.querySelector('#bagian');
    let idSubbag = document.querySelector('#id_subbag');
    let idHolder = document.querySelector('#idHolder')

if (selectBagian) {
    idHolder.value = selectBagian.value
} else {
    idHolder.value = selectSatker.value
}

selectSatker.addEventListener('change', function() {
    idHolder.value = selectSatker.value
})

selectBagian.addEventListener('change', function() {
    idHolder.value = selectBagian.value
})

idSubbag.addEventListener('change', function() {
    document.querySelector('#tambah').innerHTML = idSubbag.value
})

console.log()