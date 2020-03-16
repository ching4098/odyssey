<html>
<script>
var fontSize = 1;
function zoomIn() {
    fontSize += 0.1;
    document.body.style.fontSize = fontSize + "em";
}
function zoomOut() {
    fontSize -= 0.1;
    document.body.style.fontSize = fontSize - "em";
}
</script>
<center>
<input type="button" value="Besarkan Teks" onClick="zoomIn()"/>
<input type="button" value="Kecilkan Teks" onClick="zoomOut()"/>
</center>
</html>