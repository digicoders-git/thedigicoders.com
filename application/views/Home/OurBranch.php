<style>
    .branches-section {
        padding: 40px 0;
        background: #fdfdfd;
        position: relative;
        overflow: hidden;
    }

    .branches-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(rgba(0, 109, 171, 0.03) 1.5px, transparent 1.5px);
        background-size: 30px 30px;
        z-index: 0;
    }

    .branches-section .container {
        position: relative;
        z-index: 1;
    }

    .section-title-premium {
        font-size: 40px;
        font-weight: 600;
        margin-bottom: 50px;
        color: #001c34;
        position: relative;
        display: inline-block;
    }

    .section-title-premium::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--blue);
        border-radius: 0;
    }

    .branch-profile-card {
        background: #fff;
        /* border-radius: 20px; */
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 109, 171, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        /* border-left: 6px solid var(--blue); */
    }

    .branch-profile-card.kanpur {
        /* border-left-color: var(--orange); */
    }

    .branch-profile-card.gorakhpur {
        /* border-left-color: #00964C; */
    }

    /* Hover without zoom/scale */
    .branch-profile-card:hover {
        box-shadow: 0 15px 45px rgba(0, 109, 171, 0.1);
        border-color: rgba(0, 109, 171, 0.3);
    }

    .branch-img-side {
        width: 300px;
        height: 300px;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
    }

    .branch-img-side img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .branch-info-side {
        flex-grow: 1;
        padding: 15px 25px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .branch-tag {
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--blue);
        margin-bottom: 5px;
        display: block;
    }

    .branch-name {
        font-size: 20px;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 8px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .info-meta {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .info-meta i {
        color: var(--blue);
        font-size: 18px;
        margin-top: 0px;
    }

    .info-meta p {
        font-size: 14px;
        color: #4a5568;
        margin: 0;
        line-height: 1.5;
    }

    .info-meta p a {
        font-size: 14px;
        color: #4a5568;
        margin: 0;
        line-height: 1.5;
        text-decoration: none;
    }

    .branch-btn-simple {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 8px 20px;
        background: rgba(0, 109, 171, 0.05);
        color: var(--blue) !important;
        font-weight: 600;
        /* text-transform: uppercase; */
        font-size: 13px;
        letter-spacing: 1px;
        text-decoration: none !important;
        border: 1px solid var(--blue);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        margin-top: 15px;
        width: fit-content;
        position: relative;
        overflow: hidden;
    }

    .branch-btn-simple:hover {
        background: var(--blue);
        color: #fff !important;
        /* transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 109, 171, 0.2); */
    }

    .branch-btn-simple i {
        font-size: 16px;
        transition: transform 0.3s ease;
    }

    .branch-btn-simple:hover i {
        transform: translateX(5px);
    }

    @media (max-width: 991px) {
        .branch-profile-card {
            flex-direction: column;
            height: auto;
        }

        .branch-img-side,
        .branch-info-side {
            width: 100%;
        }

        .branch-img-side {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
        }
    }
</style>

<section class="branches-section">
    <div class="container text-center">
        <h2 class="section-title-premium">Our Branches</h2>

        <div class="row mt-4">
            <!-- Lucknow Branch -->
            <div class="col-lg-12">
                <div class="branch-profile-card">
                  <div class="branch-img-side">
                        <img loading="lazy" src="<?= base_url('public/assets/images/lucknow-head-office-digicoders.jpg') ?>"
                            alt="Lucknow Branch">
                    </div>
                    <div class="branch-info-side text-left">
                        <span class="branch-tag">Corporate Headquarters</span>
                        <h3 class="branch-name">Lucknow Head Office</h3>
                        <div class="info-grid">
                            <div class="info-meta">
                                <i class="ri-map-pin-2-fill"></i>
                                <p><a href="https://maps.app.goo.gl/CKH8UGBoK7gJZJdn9" target="_blank">2ND FLOOR, B-36, SECTOR O, NEAR RAM RAM BANK CHAURAHA, ALIGANJ, LUCKNOW, UP 226021
                                    </a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-phone-fill"></i>
                                <p><a href="tel:+919198483820">+91 91984 83820</a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-time-fill"></i>
                                <p>Mon - Sat | 10:00 AM - 07:00 PM</p>
                            </div>
                        </div>
                        <a href="<?= base_url('home/lucknowbranch') ?>" class="branch-btn-simple">
                            Know More
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kanpur Branch -->
            <div class="col-lg-12">
                <div class="branch-profile-card kanpur">
                    <div class="branch-img-side">
                        <img loading="lazy" src="<?= base_url('public/assets/images/kanpur-branch-digicoders.jpg') ?>"
                            alt="Kanpur Branch">
                    </div>
                    <div class="branch-info-side text-left">
                        <span class="branch-tag">Strategic Regional Hub</span>
                        <h3 class="branch-name">Kanpur Branch</h3>
                        <div class="info-grid">
                            <div class="info-meta">
                                <i class="ri-map-pin-2-fill"></i>
                                <p><a href="https://maps.app.goo.gl/u7Exp2nKGNgTRoaK8" target="_blank">340, S-BLOCK, NEAR ANNAPOORNA HOSPITAL, SHEHNAI CHAURAHA, YASHODA NAGAR, KANPUR, 208011</a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-phone-fill"></i>
                                <p><a href="tel:+916394296293">+91 6394 296 293</a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-time-fill"></i>
                                <p>Mon - Sat | 10:00 AM - 07:00 PM</p>
                            </div>
                        </div>
                        <a href="<?= base_url('home/kanpurbranch') ?>" class="branch-btn-simple">
                            Know More
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gorakhpur Branch -->
            <div class="col-lg-12">
                <div class="branch-profile-card gorakhpur">
                    <div class="branch-img-side">
                        <img loading="lazy" src="<?= base_url('public/assets/images/gorakhpur-branch-digicoders.jpeg') ?>"
                            alt="Gorakhpur Branch">
                    </div>
                    <div class="branch-info-side text-left">
                        <span class="branch-tag">Educational Excellence Hub</span>
                        <h3 class="branch-name">Gorakhpur Branch</h3>
                        <div class="info-grid">
                            <div class="info-meta">
                                <i class="ri-map-pin-2-fill"></i>
                                <p><a href="https://maps.app.goo.gl/eDvEchLPUjRFmaGS7" target="_blank">INSIDE MAIN BUILDING, BUDDHA INSTITUTE OF TECHNOLOGY, CL-1, SECTOR-7, GIDA, GORAKHPUR, UP, 273209</a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-phone-fill"></i>
                                <p><a href="tel:+919198483820">+91 91984 83820</a></p>
                            </div>
                            <div class="info-meta">
                                <i class="ri-time-fill"></i>
                                <p>Mon - Sat | 10:00 AM - 07:00 PM</p>
                            </div>
                        </div>
                        <a href="<?= base_url('home/gorakhpurbranch') ?>" class="branch-btn-simple">
                            Know More
                        </a>
                    </div>
                </div>
            </div>
    </div>
</section>

<!-- Branch Features -->
<!-- <section class="why-choose-branches">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="display-5 fw-bold mb-3" style="color: #001c34;">Why Choose DigiCoders?</h2>
                <p class="lead text-muted">Excellence in IT training and placement delivered consistently across North
                    India.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-v2">
                    <div class="feature-icon-v2"><i class="ri-team-line"></i></div>
                    <h4 class="fw-bold">Expert Faculty</h4>
                    <p class="text-muted">Industry professionals with 7+ years of real-world project experience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-v2">
                    <div class="feature-icon-v2"><i class="ri-award-line"></i></div>
                    <h4 class="fw-bold">Certified Quality</h4>
                    <p class="text-muted">ISO certified training methodology with standard curriculum site-wide.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-v2">
                    <div class="feature-icon-v2"><i class="ri-rocket-line"></i></div>
                    <h4 class="fw-bold">Placement Support</h4>
                    <p class="text-muted">Dedicated cells at each branch ensuring 100% placement assistance.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->