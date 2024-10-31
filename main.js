const onSearchClick = () => {
    console.log("Search clicked")
}

if (window.sessionStorage.length === 0) {
    document.getElementById('logout-button').style.display = 'none';
    document.getElementById('login-button').style.display = 'block';
}
else {
    document.getElementById('logout-button').style.display = 'block';
    document.getElementById('login-button').style.display = 'none';
}