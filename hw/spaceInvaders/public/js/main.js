window.onload = initMenu;

// GLOBALS
let gameWindow;             // main game window
let gameMenu;               // main game menu
let gameHighscores;         // main game highscores
let gameOverScreen;         // main game game over screen
let enemyCont;              // enemy container
let enemyPosY = 12;         // enemies position y
let enemyPosX = 50          // enemies position X
let moving = false;         // check if enemies are moving
let moveVal;                // enemy movement interval
let enemies = 0;            // enemies current level
let enemiesKilled;          // enemies killed current level
let player;                 // player sprite
let score = 0;              // total accumulated score
let bgPosY = 0;             // background Y position
let posX = 50;              // player x position
let level = 0               // current game level
let dead = false;           // player lost round
let lifes = 3;              // users total lifes
let megaAvailable = false;  // mega combo
let loop;                   // game loop
let totalEnemiesKilled = 0; // total enemies killed
let saveGame;               // save game button
let highscore;              // highscore data
let movements;              // player movement events


function initMenu() {
    document.querySelector('#see-highscores').addEventListener('click', seeHighscores);
    document.querySelector('#back-to-menu').addEventListener('click', backToMenu);
    document.querySelector('#start-game').addEventListener('click', startGame);
    document.querySelector('input').addEventListener('keyup', (e) => validateName(e));
    gameWindow = document.querySelector('#game-window');
    gameMenu = document.querySelector('#menu');
    gameHighscores = document.querySelector('#highscores');
    gameOverScreen = document.querySelector('#game-over');
    saveGame = document.querySelector('#back-to-menu-game-over');
    saveGame.addEventListener('click', writeHighScore);
}

function spawnLife() {
    for (let i = 0; i < 3; i++) {
        const life = document.createElement('img');
        life.className = 'life';
        life.src = 'public/assets/ui/life.png';
        life.alt = 'life';
        document.querySelector('#life').appendChild(life);
    }
}

function validateName(e) {
    if (e.target.value.length >= 2) {
        saveGame.disabled = false;
        saveGame.className = 'enabled-btn';
    }

    else {
        saveGame.disabled = true;
        saveGame.className = 'disabled-btn';
    }
}

function gameOverMenu() {
    document.title = 'Game over! | Space Invaders';
    $('body').unbind('keypress');
    gameMenu.style.display = 'none';
    gameOverScreen.style.display = 'block';
}

function backToMenu() {
    document.title = 'Main Menu | Space Invaders';
    gameHighscores.style.display = 'none';
    gameOverScreen.style.display = 'none';
    gameMenu.style.display = 'block';
}

function seeHighscores() {
    document.title = 'Highscores | Space Invaders';
    Array.from(document.querySelectorAll('.highscore-list')).forEach(list => {
        gameHighscores.removeChild(list);
    });

    readHighscores();

    gameMenu.style.display = 'none';
    gameOverScreen.style.display = 'none';
    gameHighscores.style.display = 'block';
}

function startGame() {
    gameMenu.style.display = 'none';
    gameWindow.style.display = 'block';
    
    spawnLife();
    initPlayer();
    showLevelAnnouncement();
    startLevel();
    gameLoop();
}

function gameLoop() {
    loop = setInterval(() => {
        updateScore();
        moveBg();
        updateTitle();
    }, 100);
}

function updateTitle() {
    document.title = `Level: ${level} | Score: ${score} | Space Invaders`;
}

// update score
function updateScore() {
    score += 5;
    document.querySelector('#score').innerHTML = `Score: ${score}`;
    if (score >= 3000 && score % 1000 === 0) {
        showMegaCombo();
        megaAvailable = true;
    }
}


// animate game background
function moveBg() {
    gameWindow.style.backgroundPosition = `100% ${bgPosY}%`;

    if (bgPosY >= 100) {
        bgPosY = 0;
    }

    bgPosY += 10;
}

function initPlayer() {
    player = document.querySelector('#player-cont');
    player.style.left = `${posX}%`;
    player.style.transform = `translate(${-posX}%)`;
    
    $('body').bind('keypress', (e) => {
        if (e.keyCode === 13 || e.keyCode === 32) {
            shoot();
        }
    
        // left
        else if (e.key === 'a') {
            if (posX >= 2) {
                moveLeft();
            }
        }
    
        // right
        else if (e.key === 'd') {
            if (posX <= 86) {
                moveRight();
            }
        }
    
        // mega shoot (combo)
        else if (e.key === 'c' && megaAvailable) {
            mega();
            megaAvailable = false;
        }
    });
    
    //document.body.addEventListener('keydown', e => movePlayer(e));
    document.body.addEventListener('keyup', () => {
        player.style.transform = 'rotate(0deg)';
    });
}

function mega() {
    for (let i = 0; i < 20; i++) {
        shoot(i);
    }
}

function shoot(megaPos) {
    let bulletPosY = 5;
    const bullet = document.createElement('div');
    if (megaPos) {
        bullet.className = `bullet animated pulse mega bullet${Math.floor(Math.random() * 5) + 1}`;
        bullet.style.left = `${megaPos * 5}%`;
    }

    else {
        bullet.className = `bullet animated pulse bullet${Math.floor(Math.random() * 5) + 1}`;
        bullet.style.left = `${(posX + 5)}%`;
    }

    playSound('shoot');
    gameWindow.appendChild(bullet);

    const moveBullet = setInterval(() => {
        if (bulletPosY <= 94) {
            bulletPosY += 5;

            bullet.style.bottom = `${bulletPosY}%`;
            hitEnemy(bullet.getBoundingClientRect());
        }

        else {
            gameWindow.removeChild(bullet);
            clearInterval(moveBullet);
        }
    }, 75);
}

function moveLeft() {
    posX -= 4;
    
    if (posX <= 0) {
        posX = 86;
    }
    
    player.style.transform = 'rotate(-10deg)';
    player.style.left = `${posX}%`;
}

function moveRight() {
    posX += 4;
    
    if (posX >= 90) {
        posX = 2;
    }
    
    player.style.transform = 'rotate(10deg)';
    player.style.left = `${posX}%`;
}

function startLevel() {
    enemiesKilled = 0;
    
    if (enemies < 18) {
        enemies++;
    }
    level++;
    updateStats();
    document.querySelector('#level').innerHTML = `Level: ${level}`;
    enemyCont = document.querySelector('#enemy-cont');
    
    // render enemies
    enemies = enemies > 18 ? 18 : enemies;
    for (let i = 0; i < enemies; i++) {
        setTimeout(() => {
            createEnemy(i);
        }, i * 100);
    } 

    moveEnemies();
}

function moveEnemies() {
    moveVal = setInterval(() => {
        enemyPosY += getMovement();
        if (moving) {
            enemyPosX += getMovement();
            moving = false;
        }

        else {
            enemyPosX -= getMovement();
            moving = true;
        }
        enemyCont.style.top = `${enemyPosY}%`;
        enemyCont.style.left = `${enemyPosX}%`;
        hitPlayer();
    }, 2000 - (level * 35));
}

function getMovement() {
    return Math.floor(Math.random() * 4) + 1;
}

function createEnemy(enemyIndex) {
    const enemy = document.createElement('img');
    enemy.src = 'public/assets/sprites/invader.png';    
    enemy.className = 'enemy animated zoomInUp';
    setTimeout(() => {
        enemy.className = 'enemy spawned-enemy';
    }, 1000);
    setTimeout(() => {
        playSound('enemy');
    }, 500);
    
    enemyCont.appendChild(enemy);
}

function hitEnemy(bulletPos) {
    Array.from(document.querySelectorAll('.enemy')).forEach((enemy) => {
        const enemyPos = enemy.getBoundingClientRect();
        if (bulletPos.x >= enemyPos.left && bulletPos.x <= enemyPos.right && bulletPos.y >= enemyPos.top && bulletPos.y <= enemyPos.bottom) {
            if (enemy.style.opacity !== '0') {
                removeEnemy(enemy);
            }
        }
    });
}

function hitPlayer() {
    const playerPos = player.getBoundingClientRect();
    Array.from(document.querySelectorAll('.enemy')).forEach((enemy) => {
        const enemyPos = enemy.getBoundingClientRect();
        if (playerPos.x >= enemyPos.left && playerPos.x <= enemyPos.right && playerPos.y >= enemyPos.top && playerPos.y <= enemyPos.bottom || enemyPos.bottom + 20 >= gameWindow.getBoundingClientRect().bottom) {
            if (enemy.style.opacity !== '0') {
                dead = true;
                removeLife();
            }
        }
    });
}

function removeLife() {
    lifes--;
    score -= 1000;
    playSound('explosion');

    Array.from(document.querySelectorAll('.life'))
    .reverse()[0].className = 'life animated bounceOut';
    setTimeout(() => {
        document.querySelector('#life')
        .removeChild(Array.from(document.querySelectorAll('.life'))
        .reverse()[0]);
    }, 1000);

    if (lifes === 0) {
        gameOver();
        return;
    }

    updateStats();
}

function gameOver() {
    clearInterval(loop);
    clearEnemies();
    gameOverMenu();
}

function updateStats() {
    document.querySelector('#stats').innerHTML = `Enemies Killed: ${enemiesKilled}/${enemies}`;
    
    if (enemiesKilled === enemies || dead) {
        clearEnemies();
        
        dead = false;
        enemyPosY = 12;
        enemyPosX = 50;
        enemyCont.style.top = `${enemyPosY}%`;
        enemyCont.style.left = `${enemyPosX}%`;
        clearInterval(moveVal);
        showLevelAnnouncement();
        setTimeout(() => {
            startLevel();
        }, 1000);
    }
}

function clearEnemies() {
    Array.from(document.querySelectorAll('.enemy')).forEach((enemy) => {
        enemyCont.removeChild(enemy);
    });
}

function showLevelAnnouncement() {
    const announcement = document.querySelector('#announcement');
    announcement.innerHTML = `LEVEL ${level + 1}`;
    announcement.className = 'animated fadeInUp';
    announcement.style.display = 'block';
    setTimeout(() => {
        announcement.className = 'animated fadeOutUp';
        setTimeout(() => {
            announcement.style.display = 'none';
        }, 1000);
    }, 1000);
}

function showMegaCombo() {
    const announcement = document.querySelector('#mega-ready');
    announcement.className = 'animated fadeIn';
    announcement.style.display = 'block';
    setTimeout(() => {
        announcement.className = 'animated zoomOut';
        setTimeout(() => {
            announcement.style.display = 'none';
        }, 750);
    }, 750);
}

function removeEnemy(enemy) {
    playSound('invaderkilled');
    enemy.style.opacity = '0';
    enemiesKilled++;
    totalEnemiesKilled++;
    score += 100;
    updateStats();
}

function playSound(sound) {
    const audio = document.createElement('audio');
    audio.src = `public/assets/sounds/${sound}.wav`;
    audio.style.display = 'none';
    document.body.appendChild(audio);

    audio.volume = '0.3';
    audio.play();
    setTimeout(() => {
        document.body.removeChild(audio);
    }, 1000);
}

async function writeHighScore() {
    const scores = await getHighscores();
    const playerScore = {
        [Object.keys(scores).length]: {
            "name": document.querySelector('input').value,
            "score": score,
            "level": level,
            "date": new Date().toJSON().slice(0,10).replace(/-/g,'/')
        }
    };

    const mergedScores = {
        ...scores,
        ...playerScore
    }
    
    const stringifyData = JSON.stringify(mergedScores);
    $.ajax({
        type: 'POST',
        dataType : 'json',
        async: true,
        url: 'server/saveHighScore.php',
        data: { data: stringifyData }
    })
    .always(() => {
        sessionStorage.setItem('highscores', stringifyData);
        seeHighscores();
        reset();
    });
}

async function readHighscores() {
    
    const scores = [];
    let scoreData;
    
    if (sessionStorage.highscores) {
        scoresData = JSON.parse(sessionStorage.highscores);
    } else {
        scoresData = await getHighscores();
    }
    
    $.each(scoresData, (key, val) => {
        scores.push
        (
            `<li id=${key}
                value=${val.score}
            >
            <span>${val.name}</span> 
            <span>${val.score}</span> 
            <span>${val.level}</span> 
            <span>${val.date}</span>
            </li>`
        );
    });

    scores.sort((a, b) => { 
        return b.split('value=')[1].split('>')[0] - a.split('value=')[1].split('>')[0]
    });

    $('<ul/>', {
        'class': 'highscore-list animated fadeIn',
        html: scores.join("") 
    }).appendTo('#highscores');
}

async function getHighscores() {
    
    try {
        const response = await $.getJSON('public/highscores/highscores.json');
        return response;
    } 
    
    catch(error) {
        console.log(error);
    }
}

function reset() {
    score = 0;
    level = 0;
    dead = false;
    lifes = 3;
    enemyPosY = 12;
    enemyPosX = 50;
    moving = false;
    enemies = 0;
    enemiesKilled = 0;
    megaAvailable = false;
    totalEnemiesKilled = 0;
    loop = null;
    enemyCont.style.top = '10%';
    clearInterval(moveVal);
    clearEnemies();
}