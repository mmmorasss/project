function addNewlines() {
    let dropdown =document.getElementById("userId");
    let uId = document.getElementById("userId").textContent;
    let arr = Array.from(uId, Number);
    let html = "";
    for (let i = 0; i < arr.length; i++) {
        if (i % 10 === 0 && i !== 0) {
            html += arr[i]+"<br>";
        } else {
            html += arr[i];
        }
    }
    dropdown.innerHTML = html;
}
