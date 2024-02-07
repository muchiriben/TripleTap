<x-guests-layout>
    <section id="hero">
        <div id="content">
            <div id="main">
                <!--<h2>Wishing you a Merry Chrismas and a Happy New Year!!</h2>-->
                <h1>Triple Tap Limited</h1>
                <ul>
                    <li>Agency of precision</li>
                </ul>
            </div>
            <div id="cta">
                <div class="mx-4 pt-1 pb-2 relative text-center text-gray-600">
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                    <input class="border-4 border-secondary-color bg-light-color h-12 w-80 px-5 pr-16 rounded-lg text-md text-primary-color focus:outline-none"
                      type="search" name="search" placeholder="Search Accessories">
                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                      <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                        width="512px" height="512px">
                        <path
                          d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                      </svg>
                    </button>
                </form>
              </div>
              <div class="shop-cta">
                <a href="/shop"><button>
                    <span>Shop now</span>
                    <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="37" cy="37" r="35.5" stroke="#FFCE63" stroke-width="4"></circle>
                        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="#F2F7FF"></path>
                    </svg>
                </button></a>
            </div>
            </div>
            <div class="scrolldown" style="--color: #F2F7FF">
                <div class="chevrons">
                    <div class="chevrondown"></div>
                    <div class="chevrondown"></div>
                </div>
            </div>
        </div>

    </section>

    <section id="partners">
        <h1>Our Partners</h1>
        <div id="main">
            <img src="partners-logos/eagle_med.jpg" alt="">
            <img src="partners-logos/prosak.jpg" alt="">
            <img src="partners-logos/alligators.jpg" alt="">
            <img src="partners-logos/fobus.png" alt="">
            <img src="partners-logos/idpa-logo.svg" alt="">
            <img src="partners-logos/sniper.png" alt="">
            <img src="partners-logos/tripletapacademy.jpg" alt="">
            <img src="partners-logos/IPSC.png" alt="">
            <img src="partners-logos/ngao.jpg" alt="">
        </div>
    </section>

    <section id="about">
        <div id="content">
            <h1>About Triple Tap</h1>
            <p>We are a limited liability company registered in Kenya to provide high impact security training to government security agencies, private security entities, corporates and civilian firearm holders. </p>
            <p>It is located within Kedong Ranch Moi South Lake road. 
            Triple Tap boasts of highly qualified special operations instructors and field officers. </p>
        </div>
        <div id="illustration">
            <img src="{{ asset('images/target2.jpg') }}" alt="">
        </div>
    </section>

    <section id="contact-us">
        <div class="title">
            <h1>Reach Out</h1>
        </div>
        @include('includes.messages')
        <div id="form-map">
            <div id="form">
                <form  method="POST" action="{{ route('message.store') }}">
                    @csrf
    
                    <div class="formBox">
                       <div class="row50">
                           <div class="inputBox">
                              <span>First Name</span>
                              <input type="text" name="fname" placeholder="John">
                           </div>
                           <div class="inputBox">
                            <span>Last Name</span>
                            <input type="text" name="lname" placeholder="Doe">
                         </div>
                       </div>
    
                       <div class="row50">
                        <div class="inputBox">
                           <span>Email</span>
                           <input type="email" name="email" placeholder="johndoe@gmail.com">
                        </div>
                        <div class="inputBox">
                         <span>Phone Number <span class="text-green-500">(Optional)</span></span>
                         <input type="text" name="phone" placeholder="+254712345678">
                      </div>
                    </div>
    
                    <div class="row100">
                        <div class="inputBox">
                           <span>Message</span>
                           <textarea name="message" placeholder="Enter messsage here...."></textarea>
                        </div>
                    </div>
    
                    <div class="row100">
                        <div class="inputBox">
                           <input type="submit" value="Send" class="send button">
                        </div>
                    </div>
    
                    </div>
                   </form>
            </div>
            <div id="map">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.805925911362!2d36.8022405738482!3d-1.2907588986969618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10c7409cc719%3A0x9cc19aae9fdfa975!2sKedong%20House%2C%20Lenana%20Rd%2C%20Nairobi%20City!5e0!3m2!1sen!2ske!4v1702624461042!5m2!1sen!2ske" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div id="main">
            <div id="contact">
                <div id="phone">
                    <h3 class="highlight">Phone:</h3>
                    <p><span class="highlight">+254</span>733 922693</p>
                </div>
                <div id="emails">
                    <h3 class="highlight">Emails:</h3>
                    <div>
                        <p>precision@tripletaplimited.com</p>
                        <p>sammy@tripletaplimited.com</p>
                    </div>
                </div>
            </div>
            <div id="socials">
                <h3 class="highlight">Join Us On</h3>
                <div class="card">
                    <a href="#" class="socialContainer containerOne">
                      <svg class="socialSvg instagramSvg" viewBox="0 0 16 16"> <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path> </svg>
                    </a>
                    
                    <a href="#" class="socialContainer containerTwo">
                      <svg class="socialSvg twitterSvg" viewBox="0 0 16 16"> <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path> </svg>              </a>
                      
                    <a href="#" class="socialContainer containerThree">
                      <svg class="socialSvg linkdinSvg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                    </a>
                    
                    <a href="#" class="socialContainer containerFour">
                      <svg class="socialSvg whatsappSvg" viewBox="0 0 16 16"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path> </svg>
                    </a>
                  </div>         
            </div>
        </div>
    </section>
 
</x-guests-layout>    