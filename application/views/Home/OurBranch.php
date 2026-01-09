<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }
        
        /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        } */
        
        .branch-header {
            position: relative;
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            margin-bottom: 60px;
            overflow: hidden;
        }
        
        .branch-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1517502884422-41eaead166d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.2;
        }
        
        .branch-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            background: white;
        }
        
        .branch-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .branch-img {
            height: 350px;
            object-fit: cover;
            object-position: top;
            width: 100%;
        }
        
        .branch-body {
            padding: 30px;
        }
        
        .branch-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
        }
        
        .branch-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent-color);
        }
        
        .branch-info {
            margin-bottom: 20px;
        }
        
        .branch-info-item {
            display: flex;
            margin-bottom: 15px;
        }
        
        .branch-icon {
            width: 40px;
            height: 40px;
            background: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--secondary-color);
            font-size: 18px;
        }
        
        .branch-contact-btn {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .branch-contact-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .map-container {
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        
        .branch-features {
            background: #f8f9fa;
            padding: 80px 0;
            margin-top: 60px;
        }
        
        .feature-box {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            height: 100%;
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 40px;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .branch-header {
                padding: 60px 0;
            }
            
            .branch-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Branches Header Section -->
<br>
<center>
    
<h2 style="padding:3px">Our Branches</h2>
</center>


    <!-- Branches Listing -->
    <section class="branches-listing">
        <div class="container">
            <div class="row">
                <!-- Lucknow Branch -->
                <div class="col-lg-6">
                    <div class="branch-card">
                    <img src="<?= base_url('public') ?>/assets/images/lucknowbranch.jpeg"alt="Lucknow Branch" class="branch-img" title="Lucknow Branch">
                        <div class="branch-body">
                            <h2 class="branch-title">Lucknow Branch</h2>
                            <div class="branch-info">
                                <div class="branch-info-item">
                                    <div class="branch-icon " >
                                    <i class="ri-map-pin-2-fill p-2"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Location</h5>
                                        <p class="mb-0">2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow Uttar Pradesh 226021</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-phone-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Contact</h5>
                                        <p class="mb-0">+91 9198483820</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-mail-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email</h5>
                                        <p class="mb-0">info@thedigicoders.com</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-time-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Working Hours</h5>
                                        <p class="mb-0">Mon-Sat: 10:00 AM - 7:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <a href="tel:+919198483820" class="branch-contact-btn"><i class="ri-phone-fill mr-1"></i>Contact Lucknow Branch</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kanpur Branch -->
                <div class="col-lg-6">
                    <div class="branch-card">
                        <img src="<?= base_url('public') ?>/assets/images/kanpurbranch.jpeg"alt="Kanpur Branch" class="branch-img" title="Kanpur Branch">
                        <div class="branch-body">
                            <h2 class="branch-title">Kanpur Branch</h2>
                            <div class="branch-info">
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-map-pin-2-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Location</h5>
                                        <p class="mb-0">128/3/98, Yashoda Nagar, Kanpur,UP, 208011,<br> Opp. Shivaji Park (Near Rahul Petrol Pump Indian Oil)</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-phone-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Contact</h5>
                                        <p class="mb-0">+91 6394 296 293</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-mail-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Email</h5>
                                        <p class="mb-0">info@thedigicoders.com</p>
                                    </div>
                                </div>
                                <div class="branch-info-item">
                                    <div class="branch-icon">
                                    <i class="ri-time-fill"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Working Hours</h5>
                                        <p class="mb-0">Mon-Sat: 10:00 AM - 7:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <a href="tel:+916394296293" class="branch-contact-btn"><i class="ri-phone-fill mr-1"></i>Contact Kanpur Branch</a>
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </section>

    <!-- Branch Features -->
    <section class="branch-features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Why Choose Us</h2>
                    <p class="lead">All our branches offer the same high-quality services and expertise</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                        <i class="ri-group-fill"></i>
                        </div>
                        <h3>Expert Teams</h3>
                        <p>Highly skilled professionals in AI, blockchain, and cloud computing at every location</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                        <i class="ri-shield-check-fill"></i>
                        </div>
                        <h3>Consistent Quality</h3>
                        <p>Same rigorous standards and quality control across all branches</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                        <i class="ri-service-fill"></i>
                        </div>
                        <h3>Local Understanding</h3>
                        <p>Deep knowledge of regional business needs and market dynamics</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->

</body>
</html>