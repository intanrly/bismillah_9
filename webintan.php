@import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
}

body {
    background: #0a2a43;
    min-height: 1500px;
}
section {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

section:before {
    content: '';
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100px;
    background: linear-gradient(to top, #0a2a43, transparent);
    z-index: 1000;
}

section:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #0a2a43;
    z-index: 1000;
    mix-blend-mode: color;
}

section img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    pointer-events: none;
}

#text2 {
    font-family: 'Poppins', sans-serif;
    position: relative;
    color: #fff;
    font-size: 5em;
    z-index: 1;
}

#road {
    z-index: 2;
}