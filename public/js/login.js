document.getElementById("loginForm").addEventListener("submit", async function(event) {
    event.preventDefault();
    console.log("Formulari enviat");  // Per confirmar que el script s'executa
    
    const formData = new FormData(this);
    const response = await fetch("../api/login.php", {
        method: "POST",
        body: formData
    });
    
    if (response.redirected) {
        window.location.href = response.url;
    } else {
        alert("Inici de sessió fallit. Si us plau, verifica les teves credencials.");
    }
});
