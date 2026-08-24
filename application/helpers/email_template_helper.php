<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Get Centralized Admin Notification Email
 * Resolves the email address to receive all lead notifications, registrations, and admin security OTPs.
 */
if (!function_exists('get_admin_notification_email')) {
    function get_admin_notification_email()
    {
        if (defined('ADMIN_NOTIFICATION_EMAIL') && !empty(ADMIN_NOTIFICATION_EMAIL)) {
            return ADMIN_NOTIFICATION_EMAIL;
        }

        $CI =& get_instance();
        if (isset($CI->db)) {
            $admin = $CI->db->get('admin_login')->row();
            if (!empty($admin->email)) {
                return $admin->email;
            }
        }

        return '';
    }
}


/**
 * The DigiCoders Master HTML Email Template Renderer
 * Formats responsive, high-deliverability HTML emails matching thedigicoders.com design system.
 */
if (!function_exists('render_digicoders_master_template')) {
    function render_digicoders_master_template($header_title = 'The DigiCoders', $badge_text = 'Official Notification', $body_content_html = '', $gradient_colors = 'linear-gradient(135deg, #006DAB 0%, #00964C 100%)', $footer_note = 'This is an automated email notification from thedigicoders.com System.', $meta_title = '')
    {
        $year = date('Y');
        $document_title = !empty($meta_title) ? $meta_title . ' | thedigicoders.com' : $header_title . ' | The DigiCoders';

        return "<!DOCTYPE html>
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>{$document_title}</title>
            <style type='text/css'>
                body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
                table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
                img { -ms-interpolation-mode: bicubic; border: 0; outline: none; text-decoration: none; }
                body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #f0f3f8; font-family: \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; }
                * { box-sizing: border-box; }

                @media screen and (max-width: 600px) {
                    .email-wrapper { padding: 10px 6px !important; }
                    .email-card { width: 100% !important; max-width: 100% !important; border-radius: 12px !important; }
                    .email-header { padding: 22px 16px !important; }
                    .email-header h1 { font-size: 22px !important; }
                    .email-body { padding: 20px 16px !important; }
                    .otp-box { padding: 16px 10px !important; }
                    .otp-code { font-size: 32px !important; letter-spacing: 5px !important; }
                    .responsive-tr { display: block !important; width: 100% !important; border-bottom: 1px dashed #e2e8f0 !important; padding: 4px 0 !important; }
                    .responsive-td-label { display: block !important; width: 100% !important; padding: 2px 0 1px 0 !important; font-weight: 700 !important; font-size: 11px !important; text-transform: uppercase; color: #64748b !important; }
                    .responsive-td-value { display: block !important; width: 100% !important; padding: 1px 0 4px 0 !important; font-size: 13px !important; word-break: break-word !important; }
                    .btn-maps { display: block !important; width: 100% !important; text-align: center !important; margin-top: 8px !important; font-size: 13px !important; box-sizing: border-box !important; }
                }
            </style>
        </head>
        <body style='margin: 0; padding: 25px 10px; background-color: #f0f3f8; font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;'>
            <div class='email-wrapper' style='width: 100%; max-width: 580px; margin: 0 auto;'>
                <div class='email-card' style='background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 12px 35px rgba(0,0,0,0.08); border: 1px solid #e2e8f0;'>
                    
                    <!-- Header Banner -->
                    <div class='email-header' style='background: {$gradient_colors}; padding: 30px 25px; text-align: center;'>
                        <h1 style='color: #ffffff; margin: 0; font-size: 26px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;'>{$header_title}</h1>
                        <span style='display: inline-block; background: rgba(255,255,255,0.2); color: #ffffff; padding: 4px 14px; border-radius: 20px; font-size: 12px; margin-top: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;'>{$badge_text}</span>
                    </div>

                    <!-- Body Container -->
                    <div class='email-body' style='padding: 35px 30px;'>
                        {$body_content_html}
                    </div>

                    <!-- Footer -->
                    <div style='background: #f8fafc; padding: 20px; text-align: center; border-top: 1px solid #e2e8f0;'>
                        <p style='color: #94a3b8; font-size: 12px; margin: 0;'>{$footer_note}</p>
                        <p style='color: #cbd5e1; font-size: 11px; margin-top: 6px;'>&copy; {$year} The DigiCoders Technologies. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </body>
        </html>";
    }
}

/**
 * 1. Admin Login Security OTP Email Builder
 */
if (!function_exists('build_admin_login_otp_email')) {
    function build_admin_login_otp_email($otp, $email, $ip_addr, $browser_name, $os_name, $date_time, $latitude = '', $longitude = '', $address = '')
    {
        $maps_url = (!empty($latitude) && !empty($longitude) && $latitude !== 'N/A' && $longitude !== 'N/A') 
            ? "https://www.google.com/maps?q=" . urlencode($latitude . ',' . $longitude) 
            : "#";

        $address_display = !empty($address) ? htmlspecialchars($address) : 'N/A';
        $lat_display = !empty($latitude) ? $latitude : 'N/A';
        $lng_display = !empty($longitude) ? $longitude : 'N/A';

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>Admin Login Verification</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>A login attempt was initiated for the <b>thedigicoders.com Admin Panel</b>. Please use the OTP below to complete authentication.</p>
        </div>

        <!-- OTP Box -->
        <div class='otp-box' style='background: #f8fafc; border: 2px dashed #006DAB; border-radius: 14px; padding: 22px; text-align: center; margin-bottom: 25px;'>
            <span style='display: block; font-size: 12px; color: #64748b; text-transform: uppercase; font-weight: 700; letter-spacing: 1.5px; margin-bottom: 8px;'>Your 6-Digit Verification Code</span>
            <span class='otp-code' style='font-size: 44px; font-weight: 800; color: #006DAB; letter-spacing: 10px; font-family: \"Courier New\", Courier, monospace; display: inline-block; word-break: break-all;'>{$otp}</span>
            <div style='margin-top: 10px;'>
                <span style='display: inline-block; background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px;'>⚠️ Valid for 2 Minutes strictly</span>
            </div>
        </div>

        <!-- Environment Details -->
        <div style='background: #f8fafc; border-radius: 12px; padding: 18px 20px; margin-bottom: 25px; border: 1px solid #e2e8f0;'>
            <h4 style='margin: 0 0 12px 0; color: #0f172a; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>🖥️ Login Request Details</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600; width: 35%;'>Target Panel:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600; word-break: break-word;'>thedigicoders.com Admin Panel</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Action / Purpose:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600; word-break: break-word;'>Admin Login OTP Verification</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Admin Email:</td><td class='responsive-td-value' style='padding: 6px 0; color: #006DAB; font-weight: 600; word-break: break-word;'>{$email}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>IP Address:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600; word-break: break-word;'><code>{$ip_addr}</code></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Browser & OS:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; word-break: break-word;'>{$browser_name} ({$os_name})</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Date & Time:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; word-break: break-word;'>{$date_time}</td></tr>
            </table>
        </div>

        <!-- Location Card Section -->
        <div style='background: #f0fdf4; border-radius: 12px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #00964C; border-top: 1px solid #dcfce7; border-right: 1px solid #dcfce7; border-bottom: 1px solid #dcfce7;'>
            <h4 style='margin: 0 0 10px 0; color: #00964C; font-size: 15px; font-weight: 700;'>📍 Login Attempt Location Info</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13px; margin-bottom: 12px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 5px 0; color: #15803d; font-weight: 600; width: 35%;'>Location Address:</td><td class='responsive-td-value' style='padding: 5px 0; color: #0f172a; font-weight: 500; line-height: 1.4; word-break: break-word;'>{$address_display}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 5px 0; color: #15803d; font-weight: 600;'>Lat & Long Coords:</td><td class='responsive-td-value' style='padding: 5px 0; color: #0f172a; font-weight: 600; word-break: break-word;'><code>{$lat_display}, {$lng_display}</code></td></tr>
            </table>";

        if ($maps_url !== '#') {
            $body .= "
            <div style='text-align: left; margin-top: 8px;'>
                <a href='{$maps_url}' target='_blank' class='btn-maps' style='display: inline-block; background: #00964C; color: #ffffff; text-decoration: none; padding: 9px 18px; border-radius: 8px; font-size: 13px; font-weight: 600; box-shadow: 0 3px 10px rgba(0,150,76,0.25); word-break: break-word;'>🗺️ Open Location on Google Maps</a>
            </div>";
        }
        $body .= "</div>";

        // Warning Box
        $body .= "
        <div style='background: #fff7ed; border: 1px solid #ffedd5; border-radius: 10px; padding: 14px 16px; text-align: left;'>
            <p style='color: #c2410c; margin: 0; font-size: 12px; line-height: 1.5;'><strong>⚠️ Security Notice:</strong> If you did not initiate this login request on thedigicoders.com Admin Panel, please change your password immediately and inform the system administrator.</p>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'Admin Panel Security Protocol', $body, 'linear-gradient(135deg, #006DAB 0%, #00964C 100%)', 'This is an automated security email from thedigicoders.com Admin System.', "[{$otp}] Admin Login Verification");
    }
}

/**
 * 2. Data Export OTP Email Builder
 */
if (!function_exists('build_data_export_otp_email')) {
    function build_data_export_otp_email($otp, $email, $date_time, $ip_addr = 'N/A')
    {
        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #991b1b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>Data Export Authorization Required</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>Someone is attempting to export/copy/print sensitive data from the Admin Panel. If this is you, use the verification code below to authorize:</p>
        </div>

        <div class='otp-box' style='background: #fff5f5; border: 2px dashed #dc2626; border-radius: 14px; padding: 22px; text-align: center; margin-bottom: 25px;'>
            <span style='display: block; font-size: 12px; color: #991b1b; text-transform: uppercase; font-weight: 700; letter-spacing: 1.5px; margin-bottom: 8px;'>Security Authorization OTP</span>
            <span class='otp-code' style='font-size: 44px; font-weight: 800; color: #dc2626; letter-spacing: 10px; font-family: \"Courier New\", Courier, monospace; display: inline-block; word-break: break-all;'>{$otp}</span>
            <div style='margin-top: 10px;'>
                <span style='display: inline-block; background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px;'>⏱️ Valid for 5 Minutes only</span>
            </div>
        </div>

        <div style='background: #f8fafc; border-radius: 12px; padding: 18px 20px; margin-bottom: 25px; border: 1px solid #e2e8f0;'>
            <h4 style='margin: 0 0 12px 0; color: #0f172a; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>🛡️ Action Audit Details</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600; width: 35%;'>Target Action:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600;'>Export / Print Data Security Check</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Target Account:</td><td class='responsive-td-value' style='padding: 6px 0; color: #dc2626; font-weight: 600;'>{$email}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>IP Address:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600;'><code>{$ip_addr}</code></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Timestamp:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a;'>{$date_time}</td></tr>
            </table>
        </div>

        <div style='background: #fff7ed; border: 1px solid #ffedd5; border-radius: 10px; padding: 14px 16px; text-align: left;'>
            <p style='color: #c2410c; margin: 0; font-size: 12px; line-height: 1.5;'><strong>⚠️ Warning:</strong> If you did not request data export, someone may be attempting unauthorized data access. Please change your admin credentials immediately.</p>
        </div>";

        return render_digicoders_master_template('The DigiCoders Security', 'Data Export Security Verification', $body, 'linear-gradient(135deg, #dc2626 0%, #991b1b 100%)', 'Automated security alert from The DigiCoders Admin Security Manager.', "[{$otp}] Data Export Verification");
    }
}

/**
 * 3. Final Year Project Registration Email Builder
 */
if (!function_exists('build_project_registration_email')) {
    function build_project_registration_email($data)
    {
        $fields = [
            'Student Name' => isset($data['student_name']) ? "<span style='color: #006DAB; font-weight: 700;'>{$data['student_name']}</span>" : 'N/A',
            'Email Address' => isset($data['email']) ? "<a href='mailto:{$data['email']}' style='color: #006DAB; text-decoration: none;'>{$data['email']}</a>" : 'N/A',
            'Mobile Number' => isset($data['mobile']) ? "<a href='tel:{$data['mobile']}' style='color: #0f172a; text-decoration: none;'>{$data['mobile']}</a>" : 'N/A',
            'Alternate Mobile' => isset($data['alt_mobile']) ? $data['alt_mobile'] : 'N/A',
            'College Name' => isset($data['college']) ? $data['college'] : (isset($data['college_name']) ? $data['college_name'] : 'N/A'),
            'Project Topic' => isset($data['project_topic']) ? "<span style='color: #00964C; font-weight: 700;'>{$data['project_topic']}</span>" : 'N/A',
            'Technology' => isset($data['technology']) ? $data['technology'] : 'N/A',
            'Branch / Education' => isset($data['branch']) ? $data['branch'] : 'N/A',
            'Academic Year' => isset($data['year']) ? $data['year'] : 'N/A',
            'Project Package' => isset($data['project_type']) ? $data['project_type'] : 'N/A',
            'Payment Plan' => isset($data['payment_type']) ? $data['payment_type'] : 'N/A',
            'Registration Amount' => isset($data['amount']) ? "<span style='display: inline-block; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; padding: 4px 10px; border-radius: 6px; font-weight: 800;'>₹ {$data['amount']}</span>" : 'N/A',
            'Date & Time' => isset($data['date']) ? $data['date'] . ' ' . (isset($data['time']) ? $data['time'] : '') : date('d M Y, h:i A'),
            'Transaction / User ID' => isset($data['txn_id']) ? $data['txn_id'] : (isset($data['userid']) ? $data['userid'] : 'N/A')
        ];

        $table_rows = "";
        foreach ($fields as $label => $val) {
            $table_rows .= "<tr class='responsive-tr'><td class='responsive-td-label' style='padding: 8px 12px; color: #64748b; font-weight: 600; width: 38%; border-bottom: 1px solid #f1f5f9;'>{$label}</td><td class='responsive-td-value' style='padding: 8px 12px; color: #0f172a; font-weight: 600; border-bottom: 1px solid #f1f5f9;'>{$val}</td></tr>";
        }

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New Project Registration</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>A new student has registered for Final Year Project Training on The DigiCoders.</p>
        </div>

        <div style='background: #ffffff; border-radius: 12px; padding: 10px 0; margin-bottom: 25px; border: 1px solid #e2e8f0; overflow: hidden;'>
            <div style='background: #f8fafc; padding: 12px 18px; border-bottom: 1px solid #e2e8f0;'>
                <h4 style='margin: 0; color: #006DAB; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>🎓 Student Registration Details</h4>
            </div>
            <table style='width: 100%; border-collapse: collapse; font-size: 13.5px;'>
                {$table_rows}
            </table>
        </div>

        <div style='background: #eff6ff; border-left: 5px solid #006DAB; border-radius: 8px; padding: 14px 16px; text-align: left;'>
            <p style='color: #1e40af; margin: 0; font-size: 12.5px; line-height: 1.5;'><strong>ℹ️ Action Note:</strong> Please verify student details and transaction ID in the Admin Panel for course enrollment confirmation.</p>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'Final Year Project Registration', $body, 'linear-gradient(135deg, #006DAB 0%, #1e40af 100%)', 'Automated student registration notification from thedigicoders.com.');
    }
}

/**
 * 4. Industrial / Summer Training Registration Email Builder
 */
if (!function_exists('build_training_registration_email')) {
    function build_training_registration_email($data)
    {
        $fields = [
            'Student Name' => isset($data['student_name']) ? "<span style='color: #ea580c; font-weight: 700;'>{$data['student_name']}</span>" : 'N/A',
            'Father Name' => isset($data['father_name']) ? $data['father_name'] : 'N/A',
            'Email Address' => isset($data['email']) ? "<a href='mailto:{$data['email']}' style='color: #ea580c; text-decoration: none;'>{$data['email']}</a>" : 'N/A',
            'Mobile Number' => isset($data['mobile']) ? "<a href='tel:{$data['mobile']}' style='color: #0f172a; text-decoration: none;'>{$data['mobile']}</a>" : 'N/A',
            'Alternate Mobile' => isset($data['alt_mobile']) ? $data['alt_mobile'] : 'N/A',
            'College Name' => isset($data['college_name']) ? $data['college_name'] : 'N/A',
            'Course' => isset($data['course']) ? "<span style='color: #006DAB; font-weight: 700;'>{$data['course']}</span>" : 'N/A',
            'Education Year' => isset($data['edu_year']) ? $data['edu_year'] : 'N/A',
            'Training Type' => isset($data['training_type']) ? $data['training_type'] : 'N/A',
            'Technology' => isset($data['technology']) ? "<span style='color: #00964C; font-weight: 700;'>{$data['technology']}</span>" : 'N/A',
            'Training Location' => isset($data['student_training_location']) ? $data['student_training_location'] : 'N/A',
            'Payment Plan' => isset($data['payment_type']) ? $data['payment_type'] : 'N/A',
            'Amount Paid' => isset($data['amount']) ? "<span style='display: inline-block; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; padding: 4px 10px; border-radius: 6px; font-weight: 800;'>₹ {$data['amount']}</span>" : 'N/A',
            'Coupon Code Applied' => isset($data['couponcode']) && !empty($data['couponcode']) ? "<span style='background: #fef3c7; color: #d97706; padding: 2px 8px; border-radius: 4px; font-weight: 700;'>{$data['couponcode']}</span>" : 'None',
            'Date & Time' => isset($data['date']) ? $data['date'] . ' ' . (isset($data['time']) ? $data['time'] : '') : date('d M Y, h:i A'),
            'Registration ID' => isset($data['userid']) ? $data['userid'] : (isset($data['txn_id']) ? $data['txn_id'] : 'N/A')
        ];

        $table_rows = "";
        foreach ($fields as $label => $val) {
            $table_rows .= "<tr class='responsive-tr'><td class='responsive-td-label' style='padding: 8px 12px; color: #64748b; font-weight: 600; width: 38%; border-bottom: 1px solid #f1f5f9;'>{$label}</td><td class='responsive-td-value' style='padding: 8px 12px; color: #0f172a; font-weight: 600; border-bottom: 1px solid #f1f5f9;'>{$val}</td></tr>";
        }

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New Training Registration</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>A new student has completed Industrial / Summer Training registration on The DigiCoders.</p>
        </div>

        <div style='background: #ffffff; border-radius: 12px; padding: 10px 0; margin-bottom: 25px; border: 1px solid #e2e8f0; overflow: hidden;'>
            <div style='background: #fff7ed; padding: 12px 18px; border-bottom: 1px solid #fed7aa;'>
                <h4 style='margin: 0; color: #ea580c; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>📝 Student Registration Summary</h4>
            </div>
            <table style='width: 100%; border-collapse: collapse; font-size: 13.5px;'>
                {$table_rows}
            </table>
        </div>

        <div style='background: #fff7ed; border-left: 5px solid #ea580c; border-radius: 8px; padding: 14px 16px; text-align: left;'>
            <p style='color: #c2410c; margin: 0; font-size: 12.5px; line-height: 1.5;'><strong>📌 Administrative Note:</strong> New registration record added. Check Admin Portal to allocate batch and counselor.</p>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'Industrial & Summer Training Registration', $body, 'linear-gradient(135deg, #ea580c 0%, #c2410c 100%)', 'Automated training registration alert from thedigicoders.com.');
    }
}

/**
 * 5. General Website Enquiry Email Builder
 */
if (!function_exists('build_enquiry_email')) {
    function build_enquiry_email($data)
    {
        $name = isset($data['name']) ? htmlspecialchars($data['name']) : 'Website Visitor';
        $email = isset($data['email']) ? htmlspecialchars($data['email']) : 'N/A';
        $phone = isset($data['phone']) ? htmlspecialchars($data['phone']) : 'N/A';
        $message_text = isset($data['message']) ? nl2br(htmlspecialchars($data['message'])) : 'N/A';
        $date_time = isset($data['date']) ? $data['date'] . ' ' . (isset($data['time']) ? $data['time'] : '') : date('d M Y, h:i A');

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New Website Enquiry</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>You have received a new enquiry message from your website contact form.</p>
        </div>

        <div style='background: #f8fafc; border-radius: 12px; padding: 18px 20px; margin-bottom: 25px; border: 1px solid #e2e8f0;'>
            <h4 style='margin: 0 0 12px 0; color: #0284c7; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>👤 Contact Information</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13.5px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600; width: 35%;'>Full Name:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 700;'>{$name}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Email Address:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0284c7; font-weight: 600;'><a href='mailto:{$email}' style='color: #0284c7; text-decoration: none;'>{$email}</a></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Mobile Number:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 700;'><a href='tel:{$phone}' style='color: #0f172a; text-decoration: none;'>{$phone}</a></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Received Time:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a;'>{$date_time}</td></tr>
            </table>
        </div>

        <div style='background: #ffffff; border-radius: 12px; padding: 20px; margin-bottom: 25px; border: 1px solid #e2e8f0; border-left: 5px solid #0284c7;'>
            <h4 style='margin: 0 0 10px 0; color: #0f172a; font-size: 14px; font-weight: 700;'>💬 Enquiry Message:</h4>
            <div style='color: #334155; font-size: 14px; line-height: 1.6; background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #f1f5f9;'>
                {$message_text}
            </div>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'New Website Lead Enquiry', $body, 'linear-gradient(135deg, #0284c7 0%, #0369a1 100%)', 'Automated lead notification from thedigicoders.com website.');
    }
}

/**
 * 6. Newsletter Subscription Email Builder
 */
if (!function_exists('build_newsletter_email')) {
    function build_newsletter_email($email, $date_time)
    {
        $email_clean = htmlspecialchars($email);
        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New Newsletter Subscriber</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>A new visitor subscribed to The DigiCoders updates.</p>
        </div>

        <div style='background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 14px; padding: 25px; text-align: center; margin-bottom: 25px;'>
            <span style='display: block; font-size: 12px; color: #047857; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin-bottom: 6px;'>Subscriber Email Address</span>
            <span style='font-size: 20px; font-weight: 700; color: #059669; word-break: break-all;'>{$email_clean}</span>
            <p style='margin: 12px 0 0 0; font-size: 13px; color: #64748b;'>Subscribed on: <b>{$date_time}</b></p>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'Newsletter Subscription Alert', $body, 'linear-gradient(135deg, #059669 0%, #047857 100%)', 'Automated newsletter notification from thedigicoders.com.');
    }
}

/**
 * 7. Webinar Registration Email Builder
 */
if (!function_exists('build_webinar_email')) {
    function build_webinar_email($data)
    {
        $name = isset($data['name']) ? htmlspecialchars($data['name']) : 'N/A';
        $email = isset($data['email']) ? htmlspecialchars($data['email']) : 'N/A';
        $mobile = isset($data['mobile']) ? htmlspecialchars($data['mobile']) : 'N/A';
        $date_time = isset($data['date']) ? $data['date'] . ' ' . (isset($data['time']) ? $data['time'] : '') : date('d M Y, h:i A');

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New Webinar Registration</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>A new attendee registered for The DigiCoders Live Webinar.</p>
        </div>

        <div style='background: #f8fafc; border-radius: 12px; padding: 18px 20px; margin-bottom: 25px; border: 1px solid #e2e8f0;'>
            <h4 style='margin: 0 0 12px 0; color: #7c3aed; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>🎯 Attendee Details</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13.5px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600; width: 35%;'>Attendee Name:</td><td class='responsive-td-value' style='padding: 6px 0; color: #7c3aed; font-weight: 700;'>{$name}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Email Address:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 600;'><a href='mailto:{$email}' style='color: #7c3aed; text-decoration: none;'>{$email}</a></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Mobile Number:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 700;'><a href='tel:{$mobile}' style='color: #0f172a; text-decoration: none;'>{$mobile}</a></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Registration Time:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a;'>{$date_time}</td></tr>
            </table>
        </div>";

        return render_digicoders_master_template('The DigiCoders', 'Webinar Event Registration', $body, 'linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%)', 'Automated event alert from thedigicoders.com.');
    }
}

/**
 * 8. AI Chatbot Lead Capture Email Builder
 */
if (!function_exists('build_ai_lead_email')) {
    function build_ai_lead_email($name, $phone, $date_time)
    {
        $name_clean = htmlspecialchars($name);
        $phone_clean = htmlspecialchars($phone);

        $body = "
        <div style='text-align: center; margin-bottom: 25px;'>
            <h2 style='color: #1e293b; margin: 0 0 8px 0; font-size: 22px; font-weight: 700;'>New AI Chat Bot Lead</h2>
            <p style='color: #64748b; font-size: 14px; margin: 0; line-height: 1.5;'>The DigiCoders AI Assistant captured a new user lead from website chat.</p>
        </div>

        <div style='background: #f8fafc; border-radius: 12px; padding: 20px; margin-bottom: 25px; border: 1px solid #e2e8f0;'>
            <h4 style='margin: 0 0 12px 0; color: #9333ea; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;'>🤖 Chat Lead Details</h4>
            <table style='width: 100%; border-collapse: collapse; font-size: 13.5px;'>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600; width: 35%;'>Lead Name:</td><td class='responsive-td-value' style='padding: 6px 0; color: #9333ea; font-weight: 700;'>{$name_clean}</td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Mobile Number:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a; font-weight: 700;'><a href='tel:{$phone_clean}' style='color: #0f172a; text-decoration: none;'>{$phone_clean}</a></td></tr>
                <tr class='responsive-tr'><td class='responsive-td-label' style='padding: 6px 0; color: #64748b; font-weight: 600;'>Captured Time:</td><td class='responsive-td-value' style='padding: 6px 0; color: #0f172a;'>{$date_time}</td></tr>
            </table>
        </div>

        <div style='background: #faf5ff; border: 1px solid #e9d5ff; border-radius: 10px; padding: 14px 16px; text-align: center;'>
            <p style='color: #7e22ce; margin: 0; font-size: 13px; font-weight: 600;'>💡 This lead is logged in your Admin AI Assistant Dashboard.</p>
        </div>";

        return render_digicoders_master_template('The DigiCoders AI', 'Website AI Assistant Lead Capture', $body, 'linear-gradient(135deg, #9333ea 0%, #7e22ce 100%)', 'Automated AI lead alert from thedigicoders.com.');
    }
}
