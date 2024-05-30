let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Small',
        image: '../Assets/dhfhf-300x200.jpg',
        price: 30
    },
    {
        id: 2,
        name: 'Chicken',
        image: '../Assets/alsl-300x200.jpg',
        price: 40
    },
    {
        id: 3,
        name: 'Chicken Ranch',
        image: '../Assets/llop-300x200.jpg',
        price: 50
    },
    {
        id: 4,
        name: 'Vegetable',
        image: '../Assets/rororo-300x200.jpg',
        price: 50
    },
    {
        id: 5,
        name: 'Meat',
        image: '../Assets/jdhhdh-300x200.jpg',
        price: 60
    },
    {
        id: 6,
        name: 'Mexican',
        image: '../Assets/nxnc-300x200.jpg',
        price: 70
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="${value.image}" alt="">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        let newDiv = document.createElement('li');
        newDiv.innerHTML = `
                <div><img src="image/${value.image}" alt=""/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
        listCard.appendChild(newDiv);
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity === 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}