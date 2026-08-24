<?php
// Use custom keywords from database if available, otherwise generate dynamic ones from the blog title
$keywords_list = "";
if (!empty($userdata->keywords)) {
    $keywords_list = $userdata->keywords;
} else if (!empty($userdata->title)) {
    $cleaned_title = preg_replace('/[^a-zA-Z0-9\s]/', '', $userdata->title);
    $words = explode(' ', $cleaned_title);
    $filtered_words = array_filter($words, function($word) {
        return strlen(trim($word)) > 3;
    });
    if (!empty($filtered_words)) {
        $keywords_list = implode(', ', array_unique($filtered_words)) . ', DigiCoders Blog, DigiCoders Technologies';
    } else {
        $keywords_list = "DigiCoders, DigiCoders Blog, " . $userdata->title;
    }
} else {
    $keywords_list = "DigiCoders, DigiCoders Blog";
}

// Define dynamic variables for headerlinks.php to prevent generic defaults
$page_title = (!empty($userdata->meta_title) ? $userdata->meta_title : (!empty($userdata->title) ? $userdata->title : "Blog Details")) . " | DigiCoders Technologies";
$meta_desc = !empty($userdata->meta_description) ? $userdata->meta_description : (!empty($userdata->content) ? substr(strip_tags($userdata->content), 0, 155) . "..." : "Read latest technology insights and articles from DigiCoders Technologies Pvt. Ltd. Lucknow.");
$og_type = "article";
$og_image = base_url('public/uploads/blog/' . $userdata->img);
$og_image_alt = !empty($userdata->img_alt) ? $userdata->img_alt : $userdata->title;
$meta_keywords = $keywords_list;
$author_name = !empty($userdata->author_name) ? trim($userdata->author_name) : 'DigiCoders Team';
$author_role = !empty($userdata->author_designation) ? trim($userdata->author_designation) : '';

// Signal to headerlinks.php to skip generic tags
$is_blog_details = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords, ENT_QUOTES, 'UTF-8') ?>">
    
    <!-- Canonical Link -->
    <?php if (!empty($userdata->canonical_url)): ?>
        <link rel="canonical" href="<?= htmlspecialchars($userdata->canonical_url, ENT_QUOTES, 'UTF-8') ?>" />
    <?php else: ?>
        <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
    <?php endif; ?>

    <!-- Crucial Robots tag to boost Google Discover and search snippets ranking -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@DigiCodersTech">
    <meta name="twitter:title" content="<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="<?= $og_image ?>">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?= htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?= $og_image ?>" />
    <meta property="og:image:secure_url" content="<?= $og_image ?>" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:alt" content="<?= htmlspecialchars($og_image_alt, ENT_QUOTES, 'UTF-8') ?>" />

    <!-- Google BlogPosting Schema Structured Data (E-E-A-T Compliant) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "<?= htmlspecialchars($userdata->title, ENT_QUOTES, 'UTF-8') ?>",
        "description": "<?= htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8') ?>",
        "image": "<?= base_url('public/uploads/blog/' . $userdata->img) ?>",
        "author": {
            "@type": "Person",
            "name": "<?= htmlspecialchars($author_name, ENT_QUOTES, 'UTF-8') ?>",
            "jobTitle": "<?= htmlspecialchars($author_role, ENT_QUOTES, 'UTF-8') ?>",
            "worksFor": {
                "@type": "Organization",
                "name": "DigiCoders Technologies Pvt. Ltd.",
                "url": "https://thedigicoders.com"
            }
        },
        "publisher": {
            "@type": "Organization",
            "name": "DigiCoders Technologies Pvt. Ltd.",
            "logo": {
                "@type": "ImageObject",
                "url": "<?= base_url('public/assets/images/logo.png') ?>"
            }
        },
        "datePublished": "<?= !empty($userdata->date) ? $userdata->date : date('Y-m-d') ?>",
        "dateModified": "<?= !empty($userdata->date) ? $userdata->date : date('Y-m-d') ?>",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?= base_url($this->uri->uri_string()) ?>"
        }
    }
    </script>

    <?php include('include/headerlinks.php') ?>

    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --dark: #111;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            color: #000;
            letter-spacing: -0.5px;
        }

        /* Hero Banner */
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 2.8rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .lead-text {
            font-size: 1.25rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Blog Details Styling */
        .blog-content-area {
            padding: 50px 0;
        }

        .blog-main-img {
            width: 100%;
            border-radius: 0px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .blog-title {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--blue);
        }

        .blog-subtitle {
            font-size: 1.3rem;
            color: #555;
            margin-bottom: 25px;
            font-weight: 500;
            border-left: 4px solid var(--orange);
            padding-left: 15px;
        }

        .blog-text {
            font-size: 1.1rem;
            color: #333;
            text-align: justify;
        }

        .blog-text ul,
        .blog-text ol {
            padding-left: 25px !important;
            list-style-position: outside;
        }

        .blog-text li {
            color: #444;
        }

        .blog-text img {
            max-width: 100%;
            height: auto !important;
            border-radius: 0px;
            margin: 20px 0;
            display: block;
        }

        /* Sidebar Styling */
        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background: #fff;
            padding: 25px;
            border-radius: 0px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }

        .widget-title {
            font-size: 1.4rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--orange);
            display: inline-block;
        }

        .recent-blog-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
            transition: var(--transition);
        }

        .recent-blog-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .recent-blog-item:hover {
            transform: translateX(5px);
        }

        .recent-blog-img {
            width: 80px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .recent-blog-info h6 {
            font-size: 0.95rem;
            margin: 0 0 5px 0;
            line-height: 1.3;
        }

        .recent-blog-info h6 a {
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .recent-blog-info h6 a:hover {
            color: var(--blue);
        }

        .recent-blog-date {
            font-size: 0.8rem;
            color: #888;
        }

        /* Table of Contents Widget Scrollability & Content Tables */
        .toc-widget-content {
            max-height: 300px;
            overflow-y: auto;
            padding-right: 6px;
            scrollbar-width: thin;
            scrollbar-color: var(--blue) #f1f1f1;
        }

        .toc-widget-content::-webkit-scrollbar {
            width: 5px;
        }

        .toc-widget-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .toc-widget-content::-webkit-scrollbar-thumb {
            background: var(--blue);
            border-radius: 4px;
        }

        .blog-text table {
            display: block;
            width: 100% !important;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .toc-list {
            list-style: none !important;
            padding-left: 0 !important;
            margin-bottom: 0 !important;
        }

        .toc-list li {
            margin-bottom: 6px;
            line-height: 1.4;
            list-style: none !important;
        }

        .toc-list a {
            color: #444;
            text-decoration: none;
            font-size: 0.925rem;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            padding: 6px 10px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .toc-list a::before {
            content: "•";
            color: var(--blue);
            font-size: 1.25rem;
            line-height: 1;
            margin-right: 8px;
            display: inline-block;
            flex-shrink: 0;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .toc-list a:hover::before,
        .toc-list a.active::before {
            color: var(--orange);
            transform: scale(1.3);
        }

        .toc-list a:hover,
        .toc-list a.active {
            color: var(--blue);
            font-weight: 600;
            background-color: rgba(0, 109, 171, 0.05);
        }

        .toc-list .toc-h1 a::before {
            content: "•";
            color: var(--blue);
            font-size: 1.3rem;
        }

        .toc-list .toc-h2 {
            padding-left: 5px;
        }

        .toc-list .toc-h2 a::before {
            content: "•";
            color: var(--blue);
            font-size: 1.15rem;
        }

        .toc-list .toc-h3 {
            padding-left: 15px;
        }

        .toc-list .toc-h3 a::before {
            content: "◦";
            font-size: 1.05rem;
            color: var(--orange);
        }

        .toc-list .toc-h4 {
            padding-left: 25px;
        }

        .toc-list .toc-h4 a::before {
            content: "▪";
            font-size: 0.9rem;
            color: #888;
        }

        .toc-list .toc-h5,
        .toc-list .toc-h6 {
            padding-left: 35px;
        }

        @media (max-width: 991px) {
            .blog-title {
                font-size: 1.8rem;
            }

            .sidebar-sticky {
                position: static;
                margin-top: 40px;
            }
        }

        /* Blog FAQ Accordion Styling */
        .accordion-button:not(.collapsed) .faq-chevron-icon {
            transform: rotate(90deg);
            color: var(--blue);
        }
        .accordion-button:not(.collapsed) {
            color: var(--blue) !important;
        }
        .accordion-item {
            border: none;
        }
        .accordion-button::after {
            display: none !important; /* Hide default Bootstrap chevron */
        }
        .transition {
            transition: var(--transition);
        }
        .accordion-button {
            text-align: left !important;
        }
        .accordion-body {
            text-align: left !important;
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Premium Hero Banner ==== -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white font-weight-bold mb-0" style="font-size: 2.4rem; line-height: 1.25; text-shadow: 0 4px 15px rgba(0,0,0,0.3);"><?= htmlspecialchars($userdata->title, ENT_QUOTES, 'UTF-8') ?></h1>
                    <p class="text-white mt-3 lead-text mb-0">Official Blog & Insights - DigiCoders Technologies</p>
                </div>
            </div>
        </div>

        <div class="blog-content-area">
            <div class="container">
                <div class="row">
                    <!-- Left: Main Blog Content -->
                    <div class="col-lg-8">
                        <div class="blog-details-inner">
                            <h2 class="blog-title"><?= htmlspecialchars($userdata->title, ENT_QUOTES, 'UTF-8') ?></h2>
                            <div class="blog-subtitle"><?= htmlspecialchars($userdata->meta_description, ENT_QUOTES, 'UTF-8') ?></div>

                            <!-- E-E-A-T Author & Publish Date Meta Bar -->
                            <?php 
                            $share_url = urlencode(base_url($this->uri->uri_string()));
                            $share_title = urlencode($userdata->title);
                            ?>
                            <div class="blog-meta-author-bar d-flex align-items-center justify-content-between flex-wrap mb-4 py-2 px-3 bg-light rounded text-muted border-start border-4 border-primary" style="font-size: 0.9rem; gap: 12px; min-height: 48px; background-color: #f8f9fa !important;">
                                <div class="d-flex align-items-center flex-wrap w-100 justify-content-between" style="gap: 12px;">
                                    <div class="d-flex align-items-center flex-wrap" style="gap: 16px;">
                                        <span class="d-inline-flex align-items-center">
                                            <svg width="16" height="16" fill="#006DAB" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                                            By&nbsp;<strong class="text-dark" style="margin-right: 6px;"><?= htmlspecialchars($author_name, ENT_QUOTES, 'UTF-8') ?></strong>
                                            <?php if (!empty($author_role)): ?>
                                                <span class="badge" style="background-color: #e8f4fd; color: #006DAB; border: 1px solid #b6e0fe; font-size: 0.75rem; padding: 3px 10px; border-radius: 12px; font-weight: 600; margin-left: 4px; margin-right: 4px;"><?= htmlspecialchars($author_role, ENT_QUOTES, 'UTF-8') ?></span>
                                            <?php endif; ?>
                                        </span>
                                        <span class="d-inline-flex align-items-center" style="margin-left: 4px;">
                                            <svg width="16" height="16" fill="#E76028" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>
                                            Published:&nbsp;<strong class="text-dark"><?= !empty($userdata->date) ? date('M d, Y', strtotime($userdata->date)) : date('M d, Y') ?></strong>
                                        </span>
                                    </div>

                                    <!-- Unique Views Counter Badge (Right Aligned) -->
                                    <div class="d-inline-flex align-items-center ms-auto">
                                        <span class="badge d-inline-flex align-items-center" style="background-color: #e6f4ea; color: #137333; border: 1px solid #ceead6; font-size: 0.8rem; padding: 4px 10px; border-radius: 12px; font-weight: 600; box-shadow: 0 1px 3px rgba(0,0,0,0.03);" title="Unique IP Views">
                                            <svg width="15" height="15" fill="#137333" viewBox="0 0 16 16" style="margin-right: 5px; flex-shrink: 0;"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg>
                                            <?= number_format(!empty($blog_views_count) ? $blog_views_count : 1) ?> Views
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center ms-auto flex-wrap" style="gap: 8px;">
                                    <!-- Google Preferences Source Follow Button -->
                                    <a href="https://www.google.com/preferences/source?q=thedigicoders.com" target="_blank" rel="noopener noreferrer" class="btn btn-sm d-inline-flex align-items-center" style="background-color: #ffffff !important; border: 1px solid #4285F4 !important; color: #4285F4 !important; font-size: 0.78rem; font-weight: 600; padding: 3px 10px; border-radius: 12px; text-decoration: none; transition: transform 0.2s;" title="Follow DigiCoders on Google Preferences" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 5px; flex-shrink: 0;"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"/></svg>
                                        Follow Source
                                    </a>

                                    <!-- Quick Share Buttons -->
                                    <span class="small font-weight-bold text-dark me-1" style="font-size: 0.85rem;">Share:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px; border-radius: 50%; background-color: #ffffff !important; border: 1px solid #e0e0e0 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.04); text-decoration: none; transition: transform 0.2s;" title="Share on Facebook" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                                        <svg width="13" height="13" fill="#1877F2" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text=<?= $share_title ?>%20<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px; border-radius: 50%; background-color: #ffffff !important; border: 1px solid #e0e0e0 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.04); text-decoration: none; transition: transform 0.2s;" title="Share on WhatsApp" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                                        <svg width="13" height="13" fill="#25D366" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.646 1.93 6.557 6.557 0 0 1 1.921 4.645c-.004 3.628-2.962 6.588-6.59 6.588z"/></svg>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px; border-radius: 50%; background-color: #ffffff !important; border: 1px solid #e0e0e0 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.04); text-decoration: none; transition: transform 0.2s;" title="Share on LinkedIn" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                                        <svg width="13" height="13" fill="#0A66C2" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=<?= $share_title ?>&url=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center justify-content-center" style="width: 30px; height: 30px; border-radius: 50%; background-color: #ffffff !important; border: 1px solid #e0e0e0 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.04); text-decoration: none; transition: transform 0.2s;" title="Share on Twitter/X" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">
                                        <svg width="12" height="12" fill="#14171A" viewBox="0 0 16 16"><path d="M12.6 0h2.454l-5.36 6.126L16 16h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.554L0 0h5.063l3.495 4.633L12.601 0zm-.86 14.547h1.36L4.323 1.394H2.864l8.876 13.153z"/></svg>
                                    </a>
                                </div>
                            </div>

                            <img loading="lazy" class="lazy blog-main-img"
                                src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                data-src="<?= base_url('public/uploads/blog/' . $userdata->img) ?>"
                                alt="<?= htmlspecialchars($og_image_alt, ENT_QUOTES, 'UTF-8') ?>" />

                            <!-- Collapsible Blog Content Container ("View More" / "Read Full Article") -->
                            <div id="blogExpandContainer" class="blog-expand-container collapsed" style="position: relative; max-height: 520px; overflow: hidden; transition: max-height 0.4s ease-in-out;">
                                <div class="blog-text">
                                    <?= $userdata->content ?>
                                    
                                    <?php 
                                    // Ensure minimum content word count (> 250 words) for SEO compliance
                                    $clean_text = strip_tags($userdata->content);
                                    $word_count = str_word_count($clean_text);
                                    if ($word_count < 250):
                                    ?>
                                        <div class="blog-additional-info mt-4 p-4 rounded bg-light border">
                                            <h2 class="h4 text-primary font-weight-bold mb-3">Key Overview & Insights</h2>
                                            <p style="font-size: 1.05rem; line-height: 1.7; color: #444;">
                                                At <strong>DigiCoders Technologies Pvt. Ltd.</strong>, we empower students, engineering graduates, and IT professionals with cutting-edge industry training in software development, web development, mobile application development, Python, Java, PHP, Data Analytics, and AI/ML. Our programs emphasize hands-on live project training, real-world case studies, and mentorship from experienced industry leaders in Lucknow.
                                            </p>
                                            <p style="font-size: 1.05rem; line-height: 1.7; color: #444;">
                                                Whether you are seeking 6-week summer training, 45-day industrial internship, or job-oriented apprenticeship programs, DigiCoders provides comprehensive practical modules, certification, career guidance, and 100% placement support to boost your career.
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div id="blogContentOverlay" style="position: absolute; bottom: 0; left: 0; right: 0; height: 180px; background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,0.92) 65%, rgba(255,255,255,1) 100%); pointer-events: none; transition: opacity 0.3s ease;"></div>
                            </div>

                            <!-- Read Full Article / View More Button -->
                            <div id="blogViewMoreWrapper" class="text-center my-4">
                                <button type="button" id="blogViewMoreBtn" onclick="toggleBlogContent()" class="btn btn-outline-primary shadow-sm font-weight-bold px-4 py-2 d-inline-flex align-items-center" style="border-radius: 25px; border-width: 2px; font-size: 0.95rem; background-color: #ffffff !important; border-color: #006DAB !important; color: #006DAB !important; gap: 8px;">
                                    <span>View More</span> <i class="fa fa-chevron-down" id="blogViewMoreIcon"></i>
                                </button>
                            </div>

                            <!-- Social Sharing Bar (Placed at Bottom of Article) -->
                            <?php 
                            $share_url = urlencode(base_url($this->uri->uri_string()));
                            $share_title = urlencode($userdata->title);
                            ?>
                            <div class="social-share-bar mt-4 pt-3 border-top p-3 bg-light rounded d-flex align-items-center flex-wrap" style="border-left: 4px solid var(--blue); gap: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
                                <span class="font-weight-bold text-dark mr-2 d-flex align-items-center" style="font-size: 0.95rem; color: #222;">
                                    <svg width="18" height="18" fill="#006DAB" viewBox="0 0 16 16" style="margin-right: 6px;"><path fill="#006DAB" d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/></svg>
                                    Share Article:
                                </span>
                                <div class="d-flex flex-wrap" style="gap: 8px;">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #1877F2; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="15" height="15" fill="#ffffff" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
                                        Facebook
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text=<?= $share_title ?>%20<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #25D366; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="15" height="15" fill="#ffffff" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.646 1.93 6.557 6.557 0 0 1 1.921 4.645c-.004 3.628-2.962 6.588-6.59 6.588z"/></svg>
                                        WhatsApp
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #0A66C2; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="15" height="15" fill="#ffffff" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/></svg>
                                        LinkedIn
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=<?= $share_title ?>&url=<?= $share_url ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #14171A; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="14" height="14" fill="#ffffff" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M12.6 0h2.454l-5.36 6.126L16 16h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.554L0 0h5.063l3.495 4.633L12.601 0zm-.86 14.547h1.36L4.323 1.394H2.864l8.876 13.153z"/></svg>
                                        Twitter
                                    </a>
                                    <a href="https://t.me/share/url?url=<?= $share_url ?>&text=<?= $share_title ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #0088cc; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="15" height="15" fill="#ffffff" viewBox="0 0 24 24" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.2-.08-.06-.19-.04-.27-.02-.12.02-1.96 1.25-5.54 3.69-.52.36-1 .53-1.42.52-.47-.01-1.37-.26-2.03-.48-.82-.27-1.47-.42-1.42-.88.03-.24.37-.49 1.02-.75 3.99-1.74 6.66-2.89 8.01-3.45 3.82-1.59 4.61-1.87 5.13-1.88.11 0 .37.03.54.17.14.12.18.28.2.44-.01.06.01.19 0 .28z"/></svg>
                                        Telegram
                                    </a>
                                    <button onclick="copyArticleLink()" class="btn btn-sm text-white px-3 py-2 d-inline-flex align-items-center" style="background-color: #343a40; color: #ffffff !important; border: none; border-radius: 4px; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                        <svg width="15" height="15" fill="#ffffff" viewBox="0 0 16 16" style="margin-right: 6px; flex-shrink: 0;"><path fill="#ffffff" d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 1-.154.199 2 2 0 0 1 2.828 2.828l-1.829 1.828a2 2 0 1 1-2.828-2.828l1.372-1.372a.5.5 0 1 0-.707-.707L5.308 6.542a.5.5 0 0 0-.593-.005zm6.57-1.084 1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 1.672A3 3 0 0 0 7.414 6.5l.586-.586a1.002 1.002 0 0 1 .154-.199 2 2 0 0 1-2.828-2.828l1.829-1.828a2 2 0 1 1 2.828 2.828L8.586 4.757a.5.5 0 0 0 .707.707l1.372-1.372a.5.5 0 0 0 .593.005z"/></svg>
                                        Copy Link
                                    </button>
                                </div>
                            </div>

                            <!-- FAQ Section -->
                            <?php 
                            $faqs = array();
                            if (!empty($userdata->faqs)) {
                                $faqs = json_decode($userdata->faqs, true);
                            }
                            if (!empty($faqs)): 
                            ?>
                                <div class="blog-faqs-section mt-5 border-top pt-4">
                                    <h2 class="mb-4" style="color: var(--blue); font-size: 1.6rem; font-weight: 700;">Frequently Asked Questions</h2>
                                    <div class="accordion" id="blogFaqAccordion">
                                        <?php foreach ($faqs as $i => $faq): ?>
                                            <div class="accordion-item border-bottom py-3">
                                                <h4 class="accordion-header mb-0" id="faqHeading<?= $i ?>">
                                                     <button class="accordion-button collapsed btn text-left w-100 p-0 d-flex justify-content-between align-items-center" 
                                                             type="button" 
                                                             data-toggle="collapse" 
                                                             data-target="#faqCollapse<?= $i ?>" 
                                                             aria-expanded="false" 
                                                             aria-controls="faqCollapse<?= $i ?>"
                                                             style="box-shadow: none; font-size: 1.1rem; color: #222; background: transparent; border: none; font-weight: normal; white-space: normal;">
                                                         <span style="padding-right: 15px;"><strong style="font-weight: 600;">Q <?= $i + 1 ?>.</strong> <?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?></span>
                                                         <i class="fa fa-chevron-down faq-chevron-icon transition" style="font-size: 0.9rem; flex-shrink: 0;"></i>
                                                     </button>
                                                </h4>
                                                <div id="faqCollapse<?= $i ?>" 
                                                     class="accordion-collapse collapse" 
                                                     aria-labelledby="faqHeading<?= $i ?>" 
                                                     data-parent="#blogFaqAccordion">
                                                    <div class="accordion-body mt-2 text-muted" style="font-size: 1rem; line-height: 1.6;">
                                                        <strong style="font-weight: 600; color: #222;">Ans.</strong> <?= nl2br(htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8')) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right: Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-sticky">
                            <div class="sidebar-widget">
                                 <!-- Table of Contents Widget -->
                                <div class="toc-widget" style="margin-bottom: 25px;">
                                    <h3 class="widget-title">Table of Contents</h3>
                                    <div class="toc-widget-content">
                                        <ul id="blog-toc" class="toc-list"
                                            style="list-style: none; padding-left: 0; margin-bottom: 0;">
                                            <!-- Headings will be dynamically generated here -->
                                        </ul>
                                    </div>
                                    <hr style="margin: 25px 0 0 0; border-color: #eee;">
                                </div>

                                <!-- Sidebar Inquiry Form Widget (Between TOC & Recent Posts) -->
                                <div class="sidebar-inquiry-widget my-4 p-3 bg-light rounded border border-primary" style="box-shadow: 0 4px 15px rgba(0,109,171,0.06); background: #ffffff !important;">
                                    <h3 class="widget-title mb-2" style="font-size: 1.25rem; font-weight: 700; color: var(--blue); border-bottom-color: var(--orange);">Quick Inquiry</h3>
                                   
                                    <div id="sidebarInquiryAlert" style="display: none;"></div>

                                    <form id="sidebarInquiryForm" method="POST" onsubmit="submitSidebarInquiry(event)">
                                        <input type="hidden" name="blog_title" value="<?= htmlspecialchars($userdata->title, ENT_QUOTES, 'UTF-8') ?>" />
                                        
                                        <div class="mb-3 text-start">
                                            <label class="form-label font-weight-bold small text-dark mb-1" style="font-weight: 600;">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="inq_name" class="form-control form-control-sm" placeholder="Enter your name" required style="font-size: 0.9rem;" />
                                            <small id="inq_name_err" class="text-danger" style="display:none; font-size: 0.75rem;"></small>
                                        </div>
                                        
                                        <div class="mb-3 text-start">
                                            <label class="form-label font-weight-bold small text-dark mb-1" style="font-weight: 600;">Phone Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="phone" id="inq_phone" class="form-control form-control-sm" placeholder="10-digit number" maxlength="10" required style="font-size: 0.9rem;" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                            <small id="inq_phone_err" class="text-danger" style="display:none; font-size: 0.75rem;">Must be 10 digits starting with 6, 7, 8, or 9</small>
                                        </div>

                                        <div class="mb-3 text-start">
                                            <label class="form-label font-weight-bold small text-dark mb-1" style="font-weight: 600;">Requirement / Course</label>
                                            <textarea name="requirement" id="inq_req" class="form-control form-control-sm" rows="2" placeholder="Tell us what you're looking for..." style="font-size: 0.9rem; height: 70px; min-height: 70px; resize: vertical;"></textarea>
                                        </div>

                                        <button type="submit" id="inq_submit_btn" class="btn btn-sm btn-primary w-100 font-weight-bold py-2" style="background: var(--blue); border: none; border-radius: 4px; color: #fff;">
                                            <i class="fa fa-paper-plane me-1"></i> Submit Inquiry
                                        </button>
                                    </form>
                                </div>
                                <hr style="margin: 25px 0; border-color: #eee;">

                                <h3 class="widget-title">Recent Posts</h3>
                                <div class="recent-blogs-list">
                                    <?php if (!empty($recent_blogs)): ?>
                                        <?php foreach ($recent_blogs as $rb): ?>
                                            <div class="recent-blog-item">
                                                <a href="<?= base_url('blog-details/' . (!empty($rb->url) ? $rb->url : $rb->id)) ?>">
                                                    <img loading="lazy" src="<?= base_url('public/uploads/blog/' . $rb->img) ?>"
                                                        alt="<?= htmlspecialchars($rb->title, ENT_QUOTES, 'UTF-8') ?>" class="recent-blog-img">
                                                </a>
                                                <div class="recent-blog-info">
                                                    <p class="h6 mb-1"><a
                                                            href="<?= base_url('blog-details/' . (!empty($rb->url) ? $rb->url : $rb->id)) ?>"><?= htmlspecialchars($rb->title, ENT_QUOTES, 'UTF-8') ?></a>
                                                    </p>
                                                    <span class="recent-blog-date"><i class="fa fa-calendar me-1" style="font-size: 0.75rem; color: var(--orange);"></i> <?= !empty($rb->date) ? date('M d, Y', strtotime($rb->date)) : date('M d, Y') ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No other posts found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CTA Widget -->
                            <div class="sidebar-widget p-4 rounded text-white"
                                style="background: linear-gradient(135deg, var(--blue) 0%, #004a75 100%); border: none; box-shadow: 0 8px 25px rgba(0, 109, 171, 0.25);">
                                <h3 class="widget-title text-white mb-3" style="border-bottom-color: rgba(255,255,255,0.3); font-size: 1.35rem; font-weight: 700;">Need Training?
                                </h3>
                                <p style="color: rgba(255,255,255,0.92); font-size: 0.95rem; line-height: 1.5;">Start your professional
                                    journey with DigiCoders Technologies today.</p>

                                <!-- Phone Call Section -->
                                <div class="contact-call-box mt-3 p-3 text-center rounded" style="background: rgba(255, 255, 255, 0.12); backdrop-filter: blur(5px); border: 1px solid rgba(255,255,255,0.2);">
                                    <span class="d-block text-white-50 small text-uppercase font-weight-bold mb-1" style="letter-spacing: 0.5px; font-size: 0.75rem;">Call Us Directly</span>
                                    <?php 
                                    $contacts = $this->db->where('status', 'true')->get('tbl_contact_numbers')->result();
                                    if (!empty($contacts)):
                                        foreach ($contacts as $contact):
                                    ?>
                                        <a href="tel:<?= preg_replace('/[^0-9+]/', '', $contact->number) ?>" class="d-flex align-items-center justify-content-center text-white font-weight-bold my-1 text-decoration-none" style="font-size: 1.05rem; gap: 8px;">
                                            <svg width="15" height="15" fill="#E76028" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                                            <?= htmlspecialchars($contact->number, ENT_QUOTES, 'UTF-8') ?>
                                        </a>
                                    <?php 
                                        endforeach;
                                    else:
                                    ?>
                                        <a href="tel:+919198483820" class="d-flex align-items-center justify-content-center text-white font-weight-bold my-1 text-decoration-none" style="font-size: 1.05rem; gap: 8px;">
                                            <svg width="15" height="15" fill="#E76028" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                                            +91 9198483820
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <!-- Direct Call Action Button -->
                                <a href="tel:+919198483820" class="btn btn-success w-100 mt-3 d-flex align-items-center justify-content-center py-2 font-weight-bold" style="background-color: #25D366; border: none; font-size: 0.95rem; gap: 8px; border-radius: 4px; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);">
                                    <svg width="16" height="16" fill="#ffffff" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/></svg>
                                    CALL NOW
                                </a>

                                <!-- Register Button -->
                                <a href="<?= base_url() ?>Home/Registration" class="btn btn-warning w-100 mt-2 text-white font-weight-bold py-2 d-flex align-items-center justify-content-center"
                                    style="background: var(--orange); border: none; font-size: 0.95rem; border-radius: 4px; box-shadow: 0 4px 12px rgba(231, 96, 40, 0.3);">REGISTER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    </div>
    <!-- Content END-->
    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const blogText = document.querySelector('.blog-text');
            const tocList = document.getElementById('blog-toc');
            const tocWidget = document.querySelector('.toc-widget');

            if (blogText && tocList) {
                // Find h1, h2, h3, h4, h5, h6 headings in the blog content
                let headings = Array.from(blogText.querySelectorAll('h1, h2, h3, h4, h5, h6'));

                // Fallback: If no h1-h6 tags are found, extract strong subheadings from blog text
                if (headings.length === 0) {
                    const boldElements = blogText.querySelectorAll('p > strong, p > b, div > strong, div > b');
                    boldElements.forEach((el) => {
                        const txt = el.textContent.trim();
                        // Include if text looks like a section title (short title between 4 and 90 chars, no ending sentence fullstop)
                        if (txt.length >= 4 && txt.length <= 90 && !txt.endsWith('.')) {
                            const parentPara = el.closest('p') || el;
                            parentPara.tocTag = 'H3';
                            headings.push(parentPara);
                        }
                    });
                }

                if (headings.length > 0) {
                    headings.forEach((heading, index) => {
                        // Create a unique ID if not present
                        const headingId = heading.id || 'blog-heading-' + index;
                        heading.id = headingId;

                        // Add smooth scrolling margin top offset
                        heading.style.scrollMarginTop = '100px';

                        const tagName = heading.tocTag || heading.tagName.toUpperCase();

                        // Create TOC item
                        const li = document.createElement('li');
                        li.className = 'toc-item toc-' + tagName.toLowerCase();

                        const a = document.createElement('a');
                        a.href = '#' + headingId;
                        a.textContent = heading.textContent.trim();

                        // Smooth scroll on click
                        a.addEventListener('click', function (e) {
                            e.preventDefault();
                            
                            const container = document.getElementById('blogExpandContainer');
                            if (container && container.classList.contains('collapsed')) {
                                toggleBlogContent();
                            }

                            heading.scrollIntoView({
                                behavior: 'smooth'
                            });
                            // Update active state in URL (without reload)
                            history.pushState(null, null, '#' + headingId);

                            // Update active class manually
                            document.querySelectorAll('#blog-toc a').forEach(link => link.classList.remove('active'));
                            a.classList.add('active');

                            // Scroll active TOC link into view inside scrollable container
                            const tocContainer = document.querySelector('.toc-widget-content');
                            if (tocContainer) {
                                const containerTop = tocContainer.scrollTop;
                                const containerHeight = tocContainer.clientHeight;
                                const linkTop = a.offsetTop;
                                const linkHeight = a.offsetHeight;
                                if (linkTop < containerTop || (linkTop + linkHeight) > (containerTop + containerHeight)) {
                                    tocContainer.scrollTo({
                                        top: linkTop - (containerHeight / 2) + (linkHeight / 2),
                                        behavior: 'smooth'
                                    });
                                }
                            }
                        });

                        li.appendChild(a);
                        tocList.appendChild(li);
                    });

                    // Highlight active heading on scroll
                    const observerOptions = {
                        root: null,
                        rootMargin: '-100px 0px -75% 0px',
                        threshold: 0
                    };

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const activeId = entry.target.id;
                                document.querySelectorAll('#blog-toc a').forEach(link => {
                                    if (link.getAttribute('href') === '#' + activeId) {
                                        link.classList.add('active');
                                    } else {
                                        link.classList.remove('active');
                                    }
                                });
                            }
                        });
                    }, observerOptions);

                    headings.forEach(heading => observer.observe(heading));

                } else {
                    // Hide TOC widget cleanly if no headings/subheadings exist in article
                    if (tocWidget) {
                        tocWidget.style.display = 'none';
                    }
                }
            }
        });

        function copyArticleLink() {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(window.location.href).then(function () {
                    alert('Article link copied to clipboard!');
                }).catch(function() {
                    prompt('Copy this link:', window.location.href);
                });
            } else {
                prompt('Copy this link:', window.location.href);
            }
        }

        function toggleBlogContent() {
            const container = document.getElementById('blogExpandContainer');
            const overlay = document.getElementById('blogContentOverlay');
            const btn = document.getElementById('blogViewMoreBtn');

            if (!container) return;

            if (container.classList.contains('collapsed')) {
                container.classList.remove('collapsed');
                container.style.maxHeight = container.scrollHeight + 100 + 'px';
                if (overlay) overlay.style.opacity = '0';
                setTimeout(() => { if (overlay) overlay.style.display = 'none'; }, 300);
                if (btn) {
                    btn.innerHTML = '<span>Show Less</span> <i class="fa fa-chevron-up"></i>';
                }
            } else {
                container.classList.add('collapsed');
                container.style.maxHeight = '520px';
                if (overlay) {
                    overlay.style.display = 'block';
                    setTimeout(() => { overlay.style.opacity = '1'; }, 10);
                }
                if (btn) {
                    btn.innerHTML = '<span>Read Full Article</span> <i class="fa fa-chevron-down"></i>';
                }
                container.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // Auto-check on DOM ready: If article total height is <= 600px, don't collapse & hide button
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.getElementById('blogExpandContainer');
            const overlay = document.getElementById('blogContentOverlay');
            const btnWrapper = document.getElementById('blogViewMoreWrapper');

            if (container) {
                if (container.scrollHeight <= 600) {
                    container.classList.remove('collapsed');
                    container.style.maxHeight = 'none';
                    if (overlay) overlay.style.display = 'none';
                    if (btnWrapper) btnWrapper.style.display = 'none';
                }
            }
        });

        function submitSidebarInquiry(e) {
            e.preventDefault();
            
            const nameInput = document.getElementById('inq_name');
            const phoneInput = document.getElementById('inq_phone');
            const nameErr = document.getElementById('inq_name_err');
            const phoneErr = document.getElementById('inq_phone_err');
            const alertDiv = document.getElementById('sidebarInquiryAlert');
            const submitBtn = document.getElementById('inq_submit_btn');

            nameErr.style.display = 'none';
            phoneErr.style.display = 'none';
            alertDiv.style.display = 'none';

            const nameVal = nameInput.value.trim();
            const phoneVal = phoneInput.value.trim();
            const phoneRegex = /^[6-9][0-9]{9}$/;

            let isValid = true;

            if (!nameVal) {
                nameErr.innerText = 'Name is mandatory.';
                nameErr.style.display = 'block';
                isValid = false;
            }

            if (!phoneVal || !phoneRegex.test(phoneVal)) {
                phoneErr.innerText = 'Phone must be a 10-digit number starting with 6, 7, 8, or 9.';
                phoneErr.style.display = 'block';
                isValid = false;
            }

            if (!isValid) return;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i> Submitting...';

            const formData = new FormData(document.getElementById('sidebarInquiryForm'));

            fetch('<?= base_url("Home/submitBlogInquiry") ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-paper-plane me-1"></i> Submit Inquiry';

                alertDiv.style.display = 'block';
                if (data.status === 'success') {
                    alertDiv.className = 'alert alert-success p-2 small mb-3 text-start';
                    alertDiv.innerText = data.msg || 'Thank you! Your enquiry has been submitted.';
                    document.getElementById('sidebarInquiryForm').reset();
                } else {
                    alertDiv.className = 'alert alert-danger p-2 small mb-3 text-start';
                    alertDiv.innerText = data.msg || 'Error submitting enquiry.';
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-paper-plane me-1"></i> Submit Inquiry';
                alertDiv.style.display = 'block';
                alertDiv.className = 'alert alert-danger p-2 small mb-3 text-start';
                alertDiv.innerText = 'Network error. Please try again.';
            });
        }
    </script>
</body>

</html>