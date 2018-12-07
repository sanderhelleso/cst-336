window.onload = start;

function start() {

   $.ajax( "api/getPetInfo.php" )
  .done(function(data) {
      data = JSON.parse(data);
      data.forEach(animal => {
        createCard(animal);
      });
  })
  .fail(function() {
    alert( "Error loading animals" );
  });
}

function createCard(data) {
    
    const card = document.createElement("div");
    card.className = "card col-md-6";
    
    const cardBody = document.createElement("div");
    cardBody.className = "card-body";
    
    const title = document.createElement("h5");
    title.className = "card-title";
    title.innerHTML = `Name ${data.name}`;
    
    const type = document.createElement("p");
    type.className = "card-text";
    type.innerHTML = `Type ${data.type}`;
    
    const btn = document.createElement("button");
    btn.className = "btn btn-primary";
    btn.innerHTML = "Addopt Me!";
    btn.addEventListener('click', () => {
      const loader = document.createElement('img');
      loader.src = 'img/loading.gif';
      loader.className = "d-block";
      cardBody.appendChild(loader)
      loadData(data, loader);
    });
    
    cardBody.appendChild(title);
    cardBody.appendChild(type);
    cardBody.appendChild(btn);
    card.appendChild(cardBody);
    
    document.querySelector('#animal-cont').appendChild(card);
}

function loadData(data, loader) {
  setTimeout(() => {
    document.querySelector('#animal-title').innerHTML = data.name;
    document.querySelector('#animal-image').src = `img/${data.pictureURL}`;
    document.querySelector('#animal-age').innerHTML = `Age: ${new Date().getFullYear() - parseInt(data.yob)}`;
    document.querySelector('#animal-breed').innerHTML = `Breed: ${data.breed}`;
    document.querySelector('#animal-desc').innerHTML = data.description;
    $('#myModal').modal('show')
    loader.parentElement.removeChild(loader);
  }, 500); // 0.5s delay to see the spinner
}