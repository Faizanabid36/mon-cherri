const lowerSlider = document.querySelector("#lower"),
    upperSlider = document.querySelector("#upper");

let filters = {
    price: {
        lowerPriceVal: parseFloat(lowerSlider.value).toFixed(2),
        upperPriceVal: parseFloat(upperSlider.value).toFixed(2),
    },
};

// const products = [
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//             "diamond-silver-ring.png",
//         ],
//         name: "Diamond Silver Ring",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["necklace (2).png", "necklace (2).png", "necklace (2).png"],
//         name: "Necklace",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: [
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//             "diamond-bracelet.png",
//         ],
//         name: "Bracelet",
//         price: 589.99,
//     },
//     {
//         reviewsCount: 4,
//         ratingsCount: 4,
//         imgs: ["diamond-ring.png", "diamond-ring.png", "diamond-ring.png"],
//         name: "Ring",
//         price: 589.99,
//     },
// ];

function updatePagination() {
    let paginationLen = 24;
    let items = $(".product-card");
    const paginationItemsLen = Math.ceil(items.length / paginationLen);
    let paginationMarkup = `<li data-page-num=${"prev"}><span><img src='../../renameMe/images/pagination-arrow.svg' /></span></li>`;

    if (paginationItemsLen > 1) {
        for (let i = 0; i < paginationItemsLen; i++) {
            paginationMarkup += `
      <li data-page-num='${i + 1}' class='${i === 0 ? "active" : ""}' ><span>${i + 1
                }</span></li>
      `;
        }
    }
    paginationMarkup += `<li data-page-num=${"next"}><span><img src='../../renameMe/images/pagination-arrow.svg' style='transform: rotate(180deg)' /></span></li>`;
    if (paginationItemsLen <= 1) {
        paginationMarkup = "";
    }
    $(".pagination").html(paginationMarkup);
    items.parent().hide();
    items.each(function (i, el) {
        i += 1;
        if (i > paginationLen) {
            return;
        }

        $(el).parent().show();
    });

    $(".pagination li").click(function () {
        $this = $(this);

        let paginationNum;

        if ($(this).attr("data-page-num") === "prev") {
            paginationNum = +$(".pagination > li.active").find("span").html() - 2;
            if (paginationNum + 1 < 1) {
                return;
            }
        } else if ($(this).attr("data-page-num") === "next") {
            paginationNum = +$(".pagination > li.active").find("span").html();
            if (paginationNum + 1 > paginationItemsLen) {
                return;
            }
        } else {
            paginationNum = +$this.find("span").html() - 1;
        }
        $(".pagination li").removeClass("active");
        $(`.pagination li[data-page-num='${paginationNum + 1}']`).addClass(
            "active"
        );
        items.parent().hide();

        items.each(function (i, el) {
            if (
                i < paginationNum * paginationLen ||
                i >= paginationNum * paginationLen + paginationLen
            ) {
                return;
            }
            $(el).parent().show();
        });
    });
}

$(".ranger .btn").click(filterByPrice);

function sliderHandler() {
    const minPriceWrapper = $("#min-price-filter");
    const maxPriceWrapper = $("#max-price-filter");

    minPriceWrapper.html(filters.price.lowerPriceVal);
    maxPriceWrapper.html(filters.price.upperPriceVal);

    function changeValues() {
        filters.price.lowerPriceVal = parseFloat(lowerSlider.value).toFixed(2);
        filters.price.upperPriceVal = parseFloat(upperSlider.value).toFixed(2);

        minPriceWrapper.html(filters.price.lowerPriceVal);
        maxPriceWrapper.html(filters.price.upperPriceVal);
    }

    upperSlider.oninput = changeValues;

    lowerSlider.oninput = changeValues;
}

function showProductsOnDOM(prods) {
    let productsMarkup = "";
    // $(".product-card").parent().remove();

    let filteredProducts;

    filteredProducts = products;

    if (prods) {
        filteredProducts = prods;
    }
    filteredProducts.forEach((el, index) => {
        let { reviewsCount, ratingsCount, imgs, name, price } = el;

        let reviewsMarkup = "";
        let imagesMarkup = `
    <div class="product-slider">
      <div class="swiper-wrapper">
    `;

        for (let i = 0; i < reviewsCount; i++) {
            reviewsMarkup += `<img src="../../renameMe/images/star-fill.png" alt="" />`;
        }

        for (let i = 0; i < 5 - reviewsCount; i++) {
            reviewsMarkup += `<img src="../../renameMe/images/star-no-fill.png" alt="" />`;
        }

        for (const img of imgs) {
            imagesMarkup += `
      <div class="swiper-slide">
          <img
            src="../../renameMe/images/${img}"
            alt=""
          />
      </div>
      `;
        }

        imagesMarkup += `
      </div>
      <div class="swiper-pagination"></div>
    </div>
    `;

        productsMarkup += `
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="product-card">
          ${imagesMarkup}
          <div class="product-details">
            <div class="reviews">
              <div class="stars">
              ${reviewsMarkup}
              </div>
            <span class='counter fit'>(${ratingsCount} Customer Review)</span>
            </div>
              <h3>${name} (${index + 1})</h3>
              <h2>$${price}</h2>
          </div>
        </div>
      </div>
  `;
    });
    $(".products_container .row").append(productsMarkup);
    $("#result-count").html(filteredProducts.length);
    const filtersLen = Object.keys(filters).length;

    $("#filters-names").html(
        `${filtersLen > 0
            ? filtersLen + ` ${filtersLen === 1 ? "Filter" : "Filters"} Applied`
            : "No Filters Applied"
        }`
    );

    new Swiper(".product-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    textFit(document.querySelectorAll(".fit"));
    updatePagination();
}

function filterByPrice() {
    let filtered = products.filter(
        (el) =>
            el.price > filters.price.lowerPriceVal &&
            el.price < filters.price.upperPriceVal
    );
    showProductsOnDOM(filtered);
}

// showProductsOnDOM();
// filterByPrice();
sliderHandler();
