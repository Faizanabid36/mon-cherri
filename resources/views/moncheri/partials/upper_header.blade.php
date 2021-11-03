<section class="upper_header_container">
    <div class="page_container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12 mx-auto">
            <div class="d-flex justify-content-between">
              <div class="d-flex align-items-center">
                <a href="#">
                  <img
                    class="world_icon"
                    src="{{asset('renameMe/images/world.svg')}}"
                    alt=""
                  />
                </a>
                <div class="selectdiv">
                  <label>
                    <select
                      class="border-0 bg-transparent mb-0 ms-2"
                      name=""
                      id=""
                    >
                      <option value="">ITN</option>
                      <option value="">ENG</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <img src="{{asset('renameMe/images/avtar.svg')}}" alt="" />
                <p class="mb-0 ms-3">SIGN IN/ REGISTER</p>
                <img
                  class="ms-3 cart_icon"
                  src="{{asset('renameMe/images/cart.svg')}}"
                  alt=""
                />
                <div class="dropdown ms-3">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img
                      class="search_icon"
                      src="{{asset('renameMe/images/search.svg')}}"
                      alt=""
                    />
                  </button>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li class="d-flex justify-content-between">
                      <input type="text" />
                      <button class="btn ms-1">Search</button>
                    </li>
                  </ul>
                </div>
                <!--
                <div class="search-wrapper ms-3">
                  <input type="text" />
                  <img
                    class="search_icon"
                    src="{{asset('renameMe/images/search.svg')}}"
                    alt=""
                  />
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
