const audio = document.getElementById('bg-music');
    const toggleBtn = document.getElementById('music-toggle');
    let isPlaying = false;

    toggleBtn.addEventListener('click', () => {
        if (isPlaying) {
            audio.pause();
            toggleBtn.textContent = 'Play Music';
        } else {
            audio.play();
            toggleBtn.textContent = 'Pause Music';
        }
        isPlaying = !isPlaying;
    });

    $(document).ready(function($){

        $('.slider-img').on('click', function(){
            $('.slider-img').removeClass('active');
            $(this).addClass('active');


        })
    });