
const api = document.getElementById('api');
const elemento = document.getElementById('new__post');
const create__post = document.getElementById('create__post');
let arrayPost = [];

const uploadData = (data) =>{
    const date = new Date().toLocaleString();
    elemento.innerHTML = ""
    data.forEach(object => {
        elemento.innerHTML += `
        <div class="col-sm-12 col-md-6 col-lg-6 card">
            <div class="card__post">
                <h3>${object.title}</h3>
                <p>${object.body}</p>
                <div class="date"><i class="fa-solid fa-calendar-days"></i> ${date}</div>
            </div>
        </div>
        `;
    });
}

const apiRest = ()=>{
    const url = 'https://jsonplaceholder.typicode.com/posts/10/posts'
    axios.get(url)
    .then(response => {
        const posts = response.data;
        arrayPost = posts.slice(0 ,10);
        uploadData(arrayPost);
    })
    .catch(e => {
        // Podemos mostrar los errores en la consola
        console.log(e);
    })
}

const createPost = () => {
    const url = 'newPost'
    axios.post(url, {
        data: arrayPost
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
}

api.addEventListener('click',apiRest);
create__post.addEventListener('click',createPost);