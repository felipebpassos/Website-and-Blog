document.addEventListener("DOMContentLoaded", function() {
    var audioToggle = document.getElementById("audio-toggle");
    var playPauseButton = document.getElementById("play-pause-button");
    var playPauseIcon = document.getElementById("play-pause-icon");
    var audioPlayer = document.getElementById("audio-player");
    var isPlaying = false;
    function toggleAudio() {
        var titulo = document.querySelector(".titulo").innerText;
        var conteudo = document.querySelector(".conteudo").innerText;
        var texto = titulo + " " + conteudo;
        var utterance = new SpeechSynthesisUtterance(texto);
        window.speechSynthesis.cancel();
        window.speechSynthesis.speak(utterance);
    }
    audioToggle.addEventListener("click", function() {
        if (!isPlaying) {
            toggleAudio();
            isPlaying = true;
            playPauseIcon.classList.remove("fa-play");
            playPauseIcon.classList.add("fa-pause");
        } else {
            window.speechSynthesis.cancel();
            isPlaying = false;
            playPauseIcon.classList.remove("fa-pause");
            playPauseIcon.classList.add("fa-play");
        }
    });
    playPauseButton.addEventListener("click", function() {
        if (!isPlaying) {
            toggleAudio();
            isPlaying = true;
            playPauseIcon.classList.remove("fa-play");
            playPauseIcon.classList.add("fa-pause");
        } else {
            window.speechSynthesis.cancel();
            isPlaying = false;
            playPauseIcon.classList.remove("fa-pause");
            playPauseIcon.classList.add("fa-play");
        }
    });
});