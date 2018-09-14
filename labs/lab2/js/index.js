window.onload = jackpot;

function jackpot() {
    
        const points = document.querySelector('#totalPoints');
        const attempts = document.querySelector('#totalAttempts');
        
        localStorage.setItem('points', parseInt(localStorage.getItem('points')) + parseInt(points.innerHTML));
        localStorage.setItem('attempts', parseInt(localStorage.getItem('attempts')) + parseInt(attempts.innerHTML));
        
        console.log(localStorage.getItem('points'));
        
        points.innerHTML = localStorage.getItem('points');
        attempts.innerHTML = localStorage.getItem('attempts');
}
