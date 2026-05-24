<!doctype html>
<html lang="en">
<head>
    <title>AI Assistant Settings - Admin Panel</title>
    <?php include('include/headerlinks.php') ?>
</head>
<body class="pace-done">
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>
        <main class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">AI Assistant</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">AI Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Flash Status Messages -->
            <?php if($this->session->flashdata('status') == 'success'): ?>
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i></div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Success</h6>
                            <div class="text-white"><?= $this->session->flashdata('msg') ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif($this->session->flashdata('status') == 'error'): ?>
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i></div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-white">Error</h6>
                            <div class="text-white"><?= $this->session->flashdata('msg') ?></div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0"><i class="bi bi-gear-fill me-2 text-primary"></i>AI Configuration</h5>
                            </div>
                            <hr/>
                            <form action="<?= base_url('AdminAi/save_settings') ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label font-weight-bold">Google Gemini API Key</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-key-fill text-primary"></i></span>
                                        <input type="password" name="gemini_api_key" id="gemini_api_key" class="form-control" 
                                               placeholder="AIzaSy..." value="<?= isset($admin->gemini_api_key) ? htmlspecialchars($admin->gemini_api_key, ENT_QUOTES, 'UTF-8') : '' ?>" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                    <div class="form-text text-muted mt-2">
                                        Note: key dynamically database me save hogi. code change karne ki zarurat nahi hai.
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-save2 me-2"></i>Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 bg-light-primary">
                        <div class="card-body">
                            <h5 class="mb-3"><i class="bi bi-info-circle-fill me-2 text-info"></i>How to get a Free API Key?</h5>
                            <hr/>
                            <div class="steps-box">
                                <h6 class="text-primary font-weight-bold mb-2">Step 1: Open Google AI Studio</h6>
                                <p class="text-muted">Go to Google AI Studio by clicking the link below:</p>
                                <a href="https://aistudio.google.com/" target="_blank" class="btn btn-sm btn-outline-primary mb-3"><i class="bi bi-box-arrow-up-right me-1"></i>Open Google AI Studio</a>

                                <h6 class="text-primary font-weight-bold mb-2">Step 2: Generate Key</h6>
                                <p class="text-muted">Click on the <b>"Get API key"</b> button, then click <b>"Create API key"</b>. Choose or create a Google Cloud project to link your key.</p>

                                <h6 class="text-primary font-weight-bold mb-2">Step 3: Paste & Save</h6>
                                <p class="text-muted">Copy the generated key (starts with <code>AIzaSy...</code>) and paste it into the Gemini API Key input field on this page, then click <b>"Save Settings"</b>.</p>
                            </div>
                            
                            <div class="mt-4 p-3 bg-white rounded border-start border-4 border-warning">
                                <h6 class="mb-1 text-warning-dark font-weight-bold"><i class="bi bi-exclamation-triangle-fill me-2 text-warning"></i>Important Note</h6>
                                <p class="mb-0 text-muted font-size-13">Har API key ki ek limit aur quota hoti hai. Agar website ka bot user traffic zyada ho, to aap Google Cloud Console me billing add karke key ki dynamic limits badha sakte hain.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="overlay nav-toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>
    <?php include('include/jslinks.php') ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#gemini_api_key');
            const toggleIcon = document.querySelector('#toggleIcon');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                if (type === 'text') {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                } else {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
