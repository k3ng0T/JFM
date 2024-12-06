







// Находим все элементы с классом "animIt"
const animElements = document.querySelectorAll('.animIt');

// Функция для проверки видимости элемента
function checkVisibility() {
  animElements.forEach((anim) => {
    const rect = anim.getBoundingClientRect();

    if (rect.top < window.innerHeight && rect.bottom > 0) {
      anim.classList.add('visible'); // Элемент виден — добавляем класс
    } else {
      anim.classList.remove('visible'); // Элемент не виден — убираем класс
    }
  });
}

// Оптимизация через requestAnimationFrame
function optimizedCheck() {
  requestAnimationFrame(checkVisibility);
}

// Обрабатываем элементы при прокрутке страницы
window.addEventListener('scroll', optimizedCheck);
checkVisibility();





document.querySelectorAll('.Shadsw').forEach((element) => {
  element.addEventListener('mousemove', (e) => {
      const rect = element.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      // Рассчитываем наклон
      const rotateX = ((y - centerY) / centerY) * -25;
      const rotateY = ((x - centerX) / centerX) * 25;

      // Рассчитываем смещение тени
      const shadowX = (x - centerX) / 25; // Сдвиг тени по X
      const shadowY = (y - centerY) / 25; // Сдвиг тени по Y

      // Применяем стили
      element.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
      element.style.boxShadow = `${shadowX}px ${shadowY}px 24px rgba(0, 0, 0, 0.4)`;
  });

  element.addEventListener('mouseleave', () => {
      element.style.transform = 'rotateX(0) rotateY(0)'; // Сброс наклона
      element.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)'; // Сброс тени
  });
});




    let lastScrollY = window.scrollY;
    let timer;

    const topMenu = document.querySelector('.top-menu');

    function showTopMenu() {
        topMenu.classList.add('visible');

        // Скрываем через 3 секунды, если не наводимся мышью
        clearTimeout(timer);
        timer = setTimeout(() => {
            if (!topMenu.matches(':hover')) {
                topMenu.classList.remove('visible');
            }
        }, 700);
    }

    // Отслеживание прокрутки
    window.addEventListener('scroll', () => {
        if (window.scrollY !== lastScrollY) {
            showTopMenu();
            lastScrollY = window.scrollY;
        }
    });

    // Оставляем видимым при наведении
    topMenu.addEventListener('mouseenter', () => {
        clearTimeout(timer);
        topMenu.classList.add('visible');
    });

    // Убираем после ухода курсора
    topMenu.addEventListener('mouseleave', () => {
        timer = setTimeout(() => {
            topMenu.classList.remove('visible');
        }, 100);
    });



    function toggleContent() {
      const content = document.getElementById('content');
      content.classList.toggle('open');
    }













    const products = [
      // Шампуни
      { category: "shampoos", name: "Шампунь Head & Shoulders", description: "Против перхоти, 400 мл", rating: 4.6, image: "/photos/shampoo1.png", price:'500₸' },
      { category: "shampoos", name: "Шампунь Pantene Pro-V", description: "Для восстановления, 500 мл", rating: 4.5, image: "/photos/shampoo2.png", price:'1400₸' },
      { category: "shampoos", name: "Шампунь Clear", description: "Мужской против перхоти, 300 мл", rating: 4.7, image: "/photos/shampoo3.png", price:'1500₸' },
      { category: "shampoos", name: "Шампунь Garnier Fructis", description: "Объем и сила, 250 мл", rating: 4.8, image: "/photos/shampoo4.png", price:'1200₸' },
      { category: "shampoos", name: "Шампунь Natura Siberica", description: "Органический, 400 мл", rating: 4.9, image: "/photos/shampoo5.png", price:'2000₸' },
  
      // Гели для душа
      { category: "shower-gels", name: "Гель для душа Nivea", description: "С алоэ вера, 250 мл", rating: 4.5, image: "/photos/showergel1.png", price:'1300₸' },
      { category: "shower-gels", name: "Гель для душа Axe", description: "С ароматом древесины, 250 мл", rating: 4.6, image: "/photos/showergel2.png", price:'1600₸' },
      { category: "shower-gels", name: "Гель для душа Dove", description: "Питательный, 300 мл", rating: 4.8, image: "/photos/showergel3.png", price:'1700₸' },
      { category: "shower-gels", name: "Гель для душа Fa", description: "Свежесть океана, 250 мл", rating: 4.4, image: "/photos/showergel4.png", price:'1500₸' },
      { category: "shower-gels", name: "Гель для душа Palmolive", description: "С ароматом кокоса, 250 мл", rating: 4.7, image: "/photos/showergel5.png", price:'1900₸' },
  
      // Средства для мытья посуды
      { category: "dish-wash", name: "Fairy Original", description: "Средство для посуды, 450 мл", rating: 4.7, image: "/photos/fairy1.png", price:'1600₸' },
      { category: "dish-wash", name: "AOS", description: "Для удаления жира, 500 мл", rating: 4.6, image: "/photos/dishwash2.png", price:'1200₸' },
      { category: "dish-wash", name: "Sorti", description: "Лимонная свежесть, 500 мл", rating: 4.5, image: "/photos/dishwash3.png", price:'1600₸' },
      { category: "dish-wash", name: "Sanit", description: "Экоформула, 450 мл", rating: 4.8, image: "/photos/dishwash4.png", price:'1800₸' },
      { category: "dish-wash", name: "Pril", description: "С экстрактом лимона, 400 мл", rating: 4.7, image: "/photos/dishwash5.png", price:'2100₸' },
  
      // Бытовая химия
      { category: "cleaners", name: "Domestos", description: "Средство для уборки, 750 мл", rating: 4.7, image: "/photos/domestos.png", price:'700₸' },
      { category: "cleaners", name: "Cillit Bang", description: "Удаляет налет и жир, 500 мл", rating: 4.6, image: "/photos/cillitbang.png", price:'900₸' },
      { category: "cleaners", name: "Mr. Proper", description: "Для полов и поверхностей, 1 л", rating: 4.8, image: "/photos/mrproper.png", price:'1200₸' },
      { category: "cleaners", name: "Comet", description: "Для раковин и ванн, 400 г", rating: 4.5, image: "/photos/comet.png", price:'1500₸' },
      { category: "cleaners", name: "Frosch", description: "Экоформула, 500 мл", rating: 4.9, image: "/photos/frosch.png", price:'1000₸' },
  
      // Освежители воздуха
      { category: "air-fresheners", name: "Air Wick", description: "Лаванда, 300 мл", rating: 4.6, image: "/photos/airwick1.png", price:'1500₸' },
      { category: "air-fresheners", name: "Glade", description: "Свежесть океана, 250 мл", rating: 4.7, image: "/photos/glade.png", price:'1200₸' },
      { category: "air-fresheners", name: "Aromatika", description: "Натуральный, 200 мл", rating: 4.8, image: "/photos/aromatika.png", price:'1900₸' },
      { category: "air-fresheners", name: "Ambi Pur", description: "С ароматом цитрусов, 300 мл", rating: 4.7, image: "/photos/ambi-pur.png", price:'900₸' },
      { category: "air-fresheners", name: "Help", description: "Антибактериальный, 300 мл", rating: 4.6, image: "/photos/help.png", price:'500₸' },
    ]
  function toggleAccordion(button) {
    const body = button.nextElementSibling;
    if (body.style.display === "inline-block") {
        body.style.display = "none";
    } else {
        document.querySelectorAll('.accordion-body').forEach(b => (b.style.display = "none"));
        body.style.display = "inline-block";
    }
}

function filterByCategory(radio) {
    const selectedCategory = radio.value;
    const filteredProducts = selectedCategory === "all" 
        ? products 
        : products.filter(product => product.category === selectedCategory);
    renderCatalog(filteredProducts);
}

// Рендерим весь каталог по умолчанию
renderCatalog(products);

  function renderCatalog(productsToRender) {
    const catalog = document.querySelector(".catalog");
    catalog.innerHTML = ""; // Очищаем каталог
    productsToRender.forEach(product => {
        const item = document.createElement("div");
        item.className = "product-item";
        item.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-details">
                <h3 class="product-title">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-rating">
                    <div class="stars">
                        ${Array(Math.floor(product.rating)).fill('<span class="star filled"></span>').join('')}
                        ${product.rating % 1 ? '<span class="star half"></span>' : ''}
                        ${Array(5 - Math.ceil(product.rating)).fill('<span class="star"></span>').join('')}
                    </div>
                    <p class="rating-value">${product.rating}/5</p>
                </div>
            </div>
            <h3 class="product-price" style="color:green">${product.price}</h3>
            <button class="buy-btn">Купить</button>
        `;
        catalog.appendChild(item);
    });

}


function filterProducts(category) {
    if (category === "all") {
        renderCatalog(products);
    } else {
        const filteredProducts = products.filter(product => product.category === category);
        renderCatalog(filteredProducts);
    }
}

// Рендерим весь каталог при загрузке
renderCatalog(products);

  // Генерация карточек
  const catalog = document.querySelector(".catalog");
  
  products.forEach((product, index) => {
      const item = document.createElement("div");
      item.className = "product-item";
      item.innerHTML = `
          <img src="${product.image}" alt="${product.name}" class="product-image">
          <div class="product-details">
              <h3 class="product-title">${product.name}</h3>
              <p class="product-description">${product.description}</p>
              <div class="product-rating">
                  <div class="stars">
                      ${Array(Math.floor(product.rating)).fill('<span class="star filled"></span>').join('')}
                      ${product.rating % 1 ? '<span class="star half"></span>' : ''}
                      ${Array(5 - Math.ceil(product.rating)).fill('<span class="star"></span>').join('')}
                  </div>
                  <p class="rating-value">${product.rating}/5</p>
              </div>
          </div>
          <button class="buy-btn">Купить</button>
      `;
      catalog.appendChild(item);
  });




  function searchProducts() {
    const searchQuery = document.getElementById('searchInput').value.toLowerCase();
    const filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchQuery));
    renderCatalog(filteredProducts);
}

function toggleAccordion(button) {
    const body = button.nextElementSibling;
    if (body.style.display === "block") {
        body.style.display = "none";
    } else {
        document.querySelectorAll('.accordion-body').forEach(b => (b.style.display = "none"));
        body.style.display = "block";
    }
}

function filterByCategory(radio) {
    const selectedCategory = radio.value;
    const filteredProducts = selectedCategory === "all"
        ? products
        : products.filter(product => product.category === selectedCategory);
    renderCatalog(filteredProducts);
}

// Отображаем весь каталог по умолчанию
renderCatalog(products);




// Создаем модальное окно
const modal = document.createElement('div');
modal.className = 'product-card';
document.body.appendChild(modal);
modal.style.position = 'absolute'; // Для позиционирования
modal.style.display = 'none'; // Скрыто по умолчанию

// Флаг видимости
let isModalVisible = false;

// Навешиваем событие "click" на товары
document.querySelectorAll('.product-item').forEach((item) => {
    item.addEventListener('click', (e) => {
        const imgSrc = item.querySelector('.product-image').src;
        const title = item.querySelector('.product-title').innerText;
        const description = item.querySelector('.product-description').innerText;
        const price = item.querySelector('.product-price').innerText;

        // Заполняем модальное окно
        modal.innerHTML = `
            <img src="${imgSrc}" alt="${title}"style="width:250px;height:350px">
            <div class="content">
                <h2 class="title">${title}</h2>
                <p class="description">${description}</p>
                <div class="price">${price}</div>
                <div class="actions">
                    <button class="cart">В корзину</button>
                    <button class="fav">Понравилось</button>
                    <button class="share" onclick="shareProduct()">Поделиться</button>
                </div>
            </div>
        `;

        if (!isModalVisible) {
          modal.style.display = 'flex'; // Сначала делаем видимым
          setTimeout(() => modal.classList.add('show'), 10); // Добавляем класс с анимацией
      } else {
          modal.classList.remove('show'); // Убираем анимацию
          setTimeout(() => (modal.style.display = 'none'), 300); // Скрываем после завершения анимации
      }
      isModalVisible = !isModalVisible;
  });
});

// Закрытие модального окна при клике вне его
document.addEventListener('click', (e) => {
  if (!modal.contains(e.target) && !e.target.closest('.product-item')) {
      modal.classList.remove('show'); // Убираем анимацию
      setTimeout(() => (modal.style.display = 'none'), 300); // Ждём завершения анимации перед скрытием
      isModalVisible = false;
  }
});


// Функция для кнопки "Поделиться"
function shareProduct() {
    const productUrl = window.location.href; // Используем текущий URL
    if (navigator.share) {
        navigator.share({
            title: 'Замечательный продукт',
            text: 'Посмотрите на этот продукт!',
            url: productUrl
        }).catch((error) => {
            console.error('Ошибка при попытке поделиться:', error);
        });
    } else {
        alert('Функция поделиться не поддерживается вашим браузером.');
    }
}


  