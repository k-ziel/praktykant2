kolur = document.querySelector("#kolur")
body = document.querySelector("body")

kolur.addEventListener("input", function() {
    body.style.backgroundColor = kolur.value
})