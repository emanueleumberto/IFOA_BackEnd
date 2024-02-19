const urlAPI = 'http://localhost/S3L1_WP/wp-json/wp/v2/'

//console.dir(document.location.search)

if(document.location.pathname === '/posts.html') {
    // Get Posts page
    fetch(urlAPI+'posts')
        .then(response => response.json())
        .then(json => createPostPage(json))
} else if(document.location.pathname === '/author.html') {
    // Get Author page
    const urlParams = new URLSearchParams(document.location.search);
    const authorId = urlParams.get('authorId')
    if(authorId) {
        fetch(urlAPI+'users/' + authorId)
            .then(response => response.json())
            .then(json => crateAuthorPage(json))
    }
} else {
    // Get Home page
    fetch(urlAPI)
    .then(response => response.json())
    .then(json => console.log(json)) 
}



// Get Author page
function crateAuthorPage(author) {
    let div = document.querySelector('div.author');
    div.innerHTML = `
                    <div class="card text-center">
                        <div class="card-header">
                            Author Detail
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="${author.avatar_urls["96"]}" class="img-thumbnail" alt="...">
                                </div>
                                <div class="col">
                                    <h5 class="card-title">${author.name}</h5>
                                    <p class="card-text">${author.description}</p>
                                    <p class="card-text">WebSite: ${author.url}</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer text-body-secondary">
                            ${author.link}
                        </div>
                    </div>
    `

}





// Get Posts page
function createPostPage(posts) {
    //console.log(posts)
    posts.forEach(post => {
        let card = document.createElement('div');
        card.className = "card my-3";

        let cardHeader = document.createElement('div')
        cardHeader.className = "card-header";
        cardHeader.innerText = '';

        post.categories.forEach(category => {
            let promise = getCategories(category);
            promise.then(category => cardHeader.innerText += category.name + ', ');
        })
        
        
        let cardBody = document.createElement('div');
        cardBody.className = "card-body";

        let title = document.createElement('h5');
        title.className = "card-title";
        title.innerText = post.title.rendered;

        let excerpt = document.createElement('div');
        excerpt.className = "card-text";
        excerpt.innerHTML = post.excerpt.rendered;

        let author = document.createElement('p');
        author.className = "card-text";
        let user = getUsers(post.author);
        user.then(u => {
            author.innerHTML = '<img src="' + u.avatar_urls["24"] + '" />';
            author.innerHTML += ' <strong>By: <a href="author.html?authorId=' + u.id + '">' + u.name + '</a></strong>';
        })

        let detail = document.createElement('a');
        detail.className = 'btn btn-dark';
        detail.href = '#';
        detail.textContent = 'Dettaglio'

        cardBody.appendChild(title);
        cardBody.appendChild(excerpt);
        cardBody.appendChild(author);
        cardBody.appendChild(detail);

        card.appendChild(cardHeader);
        card.appendChild(cardBody);

        document.querySelector('div.posts').appendChild(card);
        console.log(post)
        
        
    })
}

async function getCategories(id) {
    let promise = await fetch(urlAPI+'categories/'+id)
    return promise.json();
}

async function getUsers(id) {
    let promise = await fetch(urlAPI+'users/'+id)
    return promise.json();
}