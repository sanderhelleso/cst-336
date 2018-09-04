window.onload =  start;

function start() {
    const heading = document.querySelector('h1');
    heading.innerHTML = addSpans(heading);
    
    // run emoji gallery if index file
    const url = window.location.href.split('/');
    if (url[url.length - 1] === '') {
            emoji(document.querySelector('#emoji'));
    }
}

// add a span around every other letter
function addSpans(ele) {
    let count = 0;
    let formatedHeading = ''
    ele.innerHTML.split('').forEach(letter => {
        count++;
        if (count % 2 === 0) {
            formatedHeading += `<span>${letter}</span>`;
        }
        
        else {
            formatedHeading += letter;
        }
    });
    
    return formatedHeading;
    
}

function emoji(ele) {
    const emojis = ['&#x1F436;', '&#128565;', '&#128585;', '&#128519;', '&#129302;', '&#128169;', '&#128591;'];
    let count = 0;
    setInterval(() => {
        ele.innerHTML = emojis[count];
        count++;
        if (count === emojis.length) {
            count = 0;
        }
    }, 200);
}
