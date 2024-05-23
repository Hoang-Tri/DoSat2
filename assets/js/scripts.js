const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

/**
 * Hàm tải template
 *
 * Cách dùng:
 * <div id="parent"></div>
 * <script>
 *  load("#parent", "./path-to-template.html");
 * </script>
 */
function load(selector, path) {
    const cached = localStorage.getItem(path);
    if (cached) {
        $(selector).innerHTML = cached;
    }

    fetch(path)
        .then((res) => res.text())
        .then((html) => {
            if (html !== cached) {
                $(selector).innerHTML = html;
                localStorage.setItem(path, html);
            }
        })
        .finally(() => {
            window.dispatchEvent(new Event("template-loaded"));
        });
    }



/**
 * Hàm kiểm tra một phần tử
 * có bị ẩn bởi display: none không
 */
function isHidden(element) {
    if (!element) return true;

    if (window.getComputedStyle(element).display === "none") {
        return true;
    }

    let parent = element.parentElement;
    while (parent) {
        if (window.getComputedStyle(parent).display === "none") {
            return true;
        }
        parent = parent.parentElement;
    }

    return false;
}

/**
 * Hàm buộc một hành động phải đợi
 * sau một khoảng thời gian mới được thực thi
 */
function debounce(func, timeout = 300) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

/**
 * Hàm tính toán vị trí arrow cho dropdown
 *
 * Cách dùng:
 * 1. Thêm class "js-dropdown-list" vào thẻ ul cấp 1
 * 2. CSS "left" cho arrow qua biến "--arrow-left-pos"
 */
const calArrowPos = debounce(() => {
    if (isHidden($(".js-dropdown-list"))) return;

    const items = $$(".js-dropdown-list > li");

    items.forEach((item) => {
        const arrowPos = item.offsetLeft + item.offsetWidth / 2;
        item.style.setProperty("--arrow-left-pos", `${arrowPos}px`);
    });
});

// Tính toán lại vị trí arrow khi resize trình duyệt
window.addEventListener("resize", calArrowPos);

// Tính toán lại vị trí arrow sau khi tải template
window.addEventListener("template-loaded", calArrowPos);

/**
 * Giữ active menu khi hover
 *
 * Cách dùng:
 * 1. Thêm class "js-menu-list" vào thẻ ul menu chính
 * 2. Thêm class "js-dropdown" vào class "dropdown" hiện tại
 *  nếu muốn reset lại item active khi ẩn menu
 */
window.addEventListener("template-loaded", handleActiveMenu);

function handleActiveMenu() {
    const dropdowns = $$(".js-dropdown");
    const menus = $$(".js-menu-list");
    const activeClass = "menu-column__item--active";

    const removeActive = (menu) => {
        menu.querySelector(`.${activeClass}`)?.classList.remove(activeClass);
    };

    const init = () => {
        menus.forEach((menu) => {
            const items = menu.children;
            if (!items.length) return;

            removeActive(menu);
            if (window.innerWidth > 991) items[0].classList.add(activeClass);

            Array.from(items).forEach((item) => {
                item.onmouseenter = () => {
                    if (window.innerWidth <= 991) return;
                    removeActive(menu);
                    item.classList.add(activeClass);
                };
                item.onclick = () => {
                    if (window.innerWidth > 991) return;
                    removeActive(menu);
                    item.classList.add(activeClass);
                    item.scrollIntoView();
                };
            });
        });
    };

    init();

    dropdowns.forEach((dropdown) => {
        dropdown.onmouseleave = () => init();
    });
}

/**
 * JS toggle
 *
 * Cách dùng:
 * <button class="js-toggle" toggle-target="#box">Click</button>
 * <div id="box">Content show/hide</div>
 */
window.addEventListener("template-loaded", initJsToggle);
function initJsToggle() {
    $$(".js-toggle").forEach((button) => {
        const target = button.getAttribute("toggle-target");
        if (!target) {
            document.body.innerText = `Cần thêm toggle-target cho: ${button.outerHTML}`;
        }
        button.onclick = (e) => {
            e.preventDefault();
            if (!$(target)) {
                return (document.body.innerText = `Không tìm thấy phần tử "${target}"`);
            }
            const isHidden = $(target).classList.contains("hide");
            requestAnimationFrame(() => {
                $(target).classList.toggle("hide", !isHidden);
                $(target).classList.toggle("show", isHidden);
            });
        };

        document.onclick = function (e) {
            if (!e.target.closest(target)) {
                const isHidden = $(target).classList.contains("hide");
                if (!isHidden) {
                    button.click();
                }
            }
        };
    });
}

// dong mo li
window.addEventListener("template-loaded", () => {
    const links = $$(".js-dropdown-list > li > a");

    links.forEach((link) => {
        link.onclick = () => {
            if (window.innerWidth > 991) return;
            const item = link.closest("li");
            item.classList.toggle("navbar__item--active");
        };
    });
});

// toggle click product like
window.addEventListener("template-loaded", () => {
    const likeProducts = document.querySelectorAll(".like-btn");

    likeProducts.forEach((item) => {
        item.addEventListener("click", () => {
            item.classList.toggle("like-btn__liked");

            const id = item.id;
            const isLiked = item.classList.contains("like-btn__liked");

            let likedProducts = JSON.parse(localStorage.getItem("likedProducts")) || {};
            likedProducts[id] = isLiked;
            localStorage.setItem("likedProducts", JSON.stringify(likedProducts));

            const name = document.getElementById('wistlist_name'+id).textContent;
            const price = document.getElementById('wistlist_price'+id).value;
            const brand = document.getElementById('wistlist_brand'+id).textContent;
            const img = document.getElementById('wistlist_img'+id).src;
            const url = document.getElementById('wistlist_url'+id).href;

            if (likedProducts[id]) {
                const newItem = {
                    'url': url,
                    'id' : id,
                    'name': name,
                    'price': price,
                    'img' : img,
                    'brand': brand
                }

                let old_data = JSON.parse(localStorage.getItem('data')) || [];
                old_data.push(newItem);
                localStorage.setItem('data', JSON.stringify(old_data));
            } else {
                // Xóa mục có id tương ứng trong mảng data
                let old_data = JSON.parse(localStorage.getItem('data')) || [];
                old_data = old_data.filter(obj => obj.id !== id);
                localStorage.setItem('data', JSON.stringify(old_data));
            }
        });

        const likedProducts = JSON.parse(localStorage.getItem("likedProducts")) || {};
        const isLiked = likedProducts[item.id] || false;
        item.classList.toggle("like-btn__liked", isLiked);
    });
});









// Onclick vo nut submit forgot password
window.addEventListener("template-loaded", () => {
    const submitPassword = document.querySelector(".auth__submit-forgot-password");
    const message = document.querySelector(".message");
    const textInput = document.querySelector(".auth__form-input");
    if (submitPassword) {
        submitPassword.onclick = (e) => {
            if (textInput.type == "email") {
                if (message) {
                    e.preventDefault();
                    message.classList.add("message__success");
                }
            }
        };
    }
});

window.addEventListener("template-loaded", () => {
    const productList = document.querySelector(".product-preview__list");
    const productItems = document.querySelectorAll(".product-preview__item");
    const productThumbs = document.querySelectorAll(".product-preview__thumbs-img");
    const productThumbDesc = "product-preview__thumbs-img--current";
    if (productThumbs) {
        productThumbs.forEach((item, index) => {
            item.onclick = (e) => {
                var currentProduct = document.querySelector(
                    ".product-preview__thumbs-img.product-preview__thumbs-img--current"
                );
                currentProduct.classList.remove(productThumbDesc);
                productThumbs[index].classList.add(productThumbDesc);
                let checkLeft = productItems[index].offsetWidth;
                productList.style.transform = `translateX(${-checkLeft * index}px)`;
            };
        });
    }
});

window.addEventListener("template-loaded", () => {
    const tabsSelector = "product-tab__item";
    const contentsSelector = "product-tab__content";

    const tabActive = `${tabsSelector}--current`;
    const contentActive = `${contentsSelector}--current`;

    const tabContainers = $$(".js-tabs");
    tabContainers.forEach((tabContainer) => {
        const tabs = tabContainer.querySelectorAll(`.${tabsSelector}`);
        const contents = tabContainer.querySelectorAll(`.${contentsSelector}`);
        tabs.forEach((tab, index) => {
            tab.onclick = () => {
                tabContainer.querySelector(`.${tabActive}`)?.classList.remove(tabActive);
                tabContainer.querySelector(`.${contentActive}`)?.classList.remove(contentActive);
                tab.classList.add(tabActive);
                contents[index].classList.add(contentActive);
            };
        });
    });
});

// Payment click select

/**
 * them class checked-input vao cac the bao boc can check
 * them class checked__item vao label bao quanh input can checked
 * can co mot the label bao boc quanh input moi co the su dung
 */

/**
 * Cách chọn tất cả sản phẩm
 * cho class checked-all vào input cần check tất cả hoặc bỏ chọn tất cả
 * chọn class checked__item vào các input muốn đồng loạt checked hoặc unchecked
 */
window.addEventListener("template-loaded", () => {
    const paymentDeliverys = document.querySelectorAll(".checked-input");
    const inputCheckedAllCls = "checked-all";
    const inputCheckedCls = "checked__item";

    if (paymentDeliverys) {
        paymentDeliverys.forEach((paymentDelivery, index) => {
            paymentDelivery.onclick = () => {
                const inputPayment = paymentDelivery.querySelector(`.${inputCheckedCls}`);
                if (inputPayment) {
                    if (inputPayment.checked) {
                        inputPayment.click();
                    } else {
                        inputPayment.click();
                    }
                } else {
                    alert(`Vui long them class ${inputCheckedCls} vao input can check`);
                }
            };
        });
    }

    const checkedAll = document.querySelector(`.${inputCheckedAllCls}`);
    if (checkedAll) {
        checkedAll.onclick = () => {
            const inputCheckeds = document.querySelectorAll(`.${inputCheckedCls}`);
            if (checkedAll.checked) {
                for (input of inputCheckeds) {
                    if (!input.checked) {
                        input.click();
                    }
                }
            } else {
                for (input of inputCheckeds) {
                    if (input.checked) {
                        input.click();
                    }
                }
            }
        };
    }
});

window.addEventListener("template-loaded", () => {
    const switchBtn = document.querySelector("#switch-theme-btn");
    if (switchBtn) {
        switchBtn.onclick = function () {
            const isDark = localStorage.dark === "true";
            document.querySelector("html").classList.toggle("dark", !isDark);
            localStorage.setItem("dark", !isDark);
            switchBtn.querySelector("span").textContent = isDark ? "Dark mode" : "Light mode";
        };
        const isDark = localStorage.dark === "true";
        switchBtn.querySelector("span").textContent = isDark ? "Light mode" : "Dark mode";
    }
});

const isDark = localStorage.dark === "true";
document.querySelector("html").classList.toggle("dark", isDark);


// Quantity
window.addEventListener("template-loaded", () => {
    const updateQuantity = (quantitySpan, newQuantity) => {
        const quantity = parseInt(newQuantity);
        if (!isNaN(quantity) && quantity > 0) {
            quantitySpan.textContent = quantity;
            // Cập nhật giá trị vào input hidden
            quantitySpan.nextElementSibling.value = quantity;
        } else {
            // Đặt lại giá trị cũ nếu đầu vào không hợp lệ
            quantitySpan.textContent = quantitySpan.dataset.previousQuantity;
            quantitySpan.nextElementSibling.value = quantitySpan.dataset.previousQuantity;
        }
    };

    document.querySelectorAll('.cart__quantity-number').forEach(span => {
        span.addEventListener('focus', function() {
            this.dataset.previousQuantity = this.textContent; // Lưu lại số lượng hiện tại
        });

        span.addEventListener('blur', function() {
            updateQuantity(this, this.textContent);
            // Submit form khi blur ra khỏi span
            this.closest('form').submit();
        });

        span.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Ngăn chặn việc xuống dòng
                this.blur(); // Kích hoạt sự kiện blur để kiểm tra tính hợp lệ
            }
        });
    });


    // Lấy ra tất cả các phần tử .cart__item và chuyển đổi thành mảng
    var cartItems = Array.from(document.querySelectorAll('.cart__item'));

    // Lặp qua mỗi phần tử .cart__item
    cartItems.forEach(function(cartItem) {
        // Lấy ra các phần tử con trong từng .cart__item
        const minusBtn = cartItem.querySelector('.cart__quantity.minus');
        const plusBtn = cartItem.querySelector('.cart__quantity.plus');
        const quantitySpan = cartItem.querySelector('.cart__quantity-number');
        const quantityInput = cartItem.querySelector('.cart__quantity-input');

        quantityInput.value = parseInt(quantitySpan.textContent);

        // Xử lý sự kiện khi nhấn vào nút giảm
        minusBtn.onclick = function() {
            let currentValue = parseInt(quantitySpan.textContent);
            if (currentValue > 1) {
                quantitySpan.textContent = currentValue - 1;
                quantityInput.value = currentValue - 1; // Cập nhật giá trị trong input hidden
            }
        };

        // Xử lý sự kiện khi nhấn vào nút tăng
        plusBtn.onclick = function() {
            let currentValue = parseInt(quantitySpan.textContent);
            
            quantitySpan.textContent = currentValue + 1;
            quantityInput.value = currentValue + 1; // Cập nhật giá trị trong input hidden
        };

    });
});

window.addEventListener("template-loaded", () => {
    // Lấy dữ liệu từ localStorage
    var data = JSON.parse(localStorage.getItem('data')) || [];

    // Lấy phần tử danh sách
    var cartList = document.querySelector('.cart__list--js');

    // Tạo biến để lưu trữ HTML sản phẩm
    var productsHTML = '';

    // Duyệt qua mỗi sản phẩm và thêm vào danh sách
    for (var i = 0; i < data.length; i++) {
        var item = data[i];

        // Tạo HTML cho mỗi sản phẩm
        var productHTML = `
            <article class="cart__item">
                <a href="${item.url}" class="cart__thumb">
                    <img src="${item.img}" alt="" class="cart__thumb-img" />
                </a>
                <div class="cart__info">
                    <div class="cart__info-left">
                        <h2 class="cart__info-title">
                            <a href="${item.url}">${item.name}</a>
                        </h2>
                        <p class="cart__price">$${item.price} | <span class="cart__price-stock">X</span></p>
                        <div class="cart__row cart__row-ctrl cart__row-lg--block">
                            <div class="cart__input-wrap">
                                <div class="cart__input">${item.brand}</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart__info-right">
                        <span class="cart__total">${item.price}</span>

                        <form class='cartForm'>
                            <input type="hidden" value="${item.id}" name="pro_id">
                            <input type="hidden" value="${item.brand}" name="cart_brand_name">
                            <input type="hidden" value="${item.name}" name="cart_pro_title">
                            <input type="hidden" value="${item.img}" name="cart_pro_img">
                            <input type="hidden" value="${item.price}" name="cart_pro_price">
                            <input type="hidden" value="X" name="cart_pro_size">
                            <input type="hidden" value="1" name="cart_pro_quantity">
                            <button class="cart__info-btn btn btn--primary btn--rounded">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            </article>
        `;

        // Thêm HTML của sản phẩm vào biến productsHTML
        productsHTML += productHTML;
    }

    // Set innerHTML của cartList thành tổng HTML của tất cả sản phẩm
    cartList.innerHTML = productsHTML;
});





