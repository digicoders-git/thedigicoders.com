<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AiAssistant extends MY_Controller
{

    private $api_key = 'AIzaSyDKjH-S0gmYs8IpgLcTh24zq0HHxZ6L64g';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seo_model');
        $this->load->library('email');
    }

    public function save_lead()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        if (empty($name) || empty($phone)) {
            echo json_encode(['status' => 'error', 'message' => 'Name and Phone are required']);
            return;
        }

        $lead_data = [
            'name' => $name,
            'phone' => $phone,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('leads', $lead_data);
        $lead_id = $this->db->insert_id();

        // Set session
        $this->session->set_userdata('ai_lead_id', $lead_id);
        $this->session->set_userdata('ai_user_name', $name);

        // Send Email Notification
        $this->send_lead_email($name, $phone);

        echo json_encode(['status' => 'success', 'lead_id' => $lead_id]);
    }

    private function send_lead_email($name, $phone)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.digicoders.in',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@digicoders.in',
            'smtp_pass' => 'Me]dI7jY=w)48kc.',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'wordwrap' => TRUE
        );
        $this->email->initialize($config);
        $this->email->from('noreply@digicoders.in', 'DigiCoders AI Bot');
        $this->email->to('digicoderstech@gmail.com');
        $this->email->to('');
        $this->email->subject('New Chat Bot Lead - ' . $name);

        $message = "<h3>New AI Chat Bot Lead</h3>";
        $message .= "<p><b>Name:</b> $name</p>";
        $message .= "<p><b>Phone:</b> $phone</p>";
        $message .= "<p><b>Time:</b> " . date('d M Y, h:i A') . "</p>";

        $this->email->message($message);
        @$this->email->send();
    }

    public function chat()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_404();
        }

        $user_message = $this->input->post('message');
        if (empty($user_message)) {
            echo json_encode(['status' => 'error', 'message' => 'Message is empty']);
            return;
        }

        // 1. Search Database for relevant content
        $additional_info = "";

        // A. Search SEO Pages (Courses/Cities)
        $seo_query = $this->db->like('course_name', $user_message)
            ->or_like('meta_description', $user_message)
            ->or_like('keywords', $user_message)
            ->limit(5)
            ->get('seo_pages')
            ->result();
        foreach ($seo_query as $row) {
            $additional_info .= "\n[Course Info] " . $row->course_name . " in " . $row->city_name . ": " . strip_tags($row->meta_description) . "\n";
        }

        // B. Search Training Links
        $training_query = $this->db->like('training_name', $user_message)
            ->or_like('description', $user_message)
            ->limit(3)
            ->get('tbl_seo_training_links')
            ->result();
        foreach ($training_query as $row) {
            $additional_info .= "\n[Training Detail] " . $row->training_name . ": " . strip_tags($row->about_course) . ". Full Details: " . strip_tags($row->description) . "\n";
        }

        // C. Search FAQs
        $faq_query = $this->db->like('question', $user_message)
            ->or_like('answer', $user_message)
            ->limit(3)
            ->get('faq')
            ->result();
        foreach ($faq_query as $row) {
            $additional_info .= "\n[FAQ] Q: " . $row->question . " | A: " . strip_tags($row->answer) . "\n";
        }

        // D. Search Blogs
        $blog_query = $this->db->like('title', $user_message)
            ->or_like('content', $user_message)
            ->limit(2)
            ->get('blog')
            ->result();
        foreach ($blog_query as $row) {
            $additional_info .= "\n[Blog/Insight] " . $row->title . ": " . strip_tags($row->content) . "\n";
        }

        // E. Search Placements (to show success)
        if (stripos($user_message, 'placement') !== false || stripos($user_message, 'job') !== false) {
            $placement_query = $this->db->limit(5)->get_where('placement', ['status' => 'true'])->result();
            $additional_info .= "\n[Placement Success] Recent students placed in companies like: ";
            foreach ($placement_query as $row) {
                $additional_info .= $row->company_name . ", ";
            }
            $additional_info .= " and many more with good packages.\n";
        }

        // 2. Define System Prompt with Dynamic Context
        $context = "You are 'Agent DigiCoders', the expert AI representative for DigiCoders Technologies Pvt. Ltd.
        
        CRITICAL GOAL: Provide extremely detailed, comprehensive, and helpful answers. Analyze all the website data provided below to give specific facts.
        
        Company Identity:
        - Name: DigiCoders Technologies Pvt. Ltd. (A Govt. Regd. IT Training & Software Development Company)
        - Founded: 2019 by Himanshu Kashyap (Director) and Gopal Singh (Director).
        - HQ (Lucknow): 2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow, UP - 226021.
        - Branch (Kanpur): 340, S-BLOCK, NEAR ANNAPOORNA HOSPITAL, SHEHNAI CHAURAHA, YASHODA NAGAR, KANPUR - 208011.
        - USP: 100% Practical Training, Live Projects, and dedicated Placement Cell.
        
        Data from Website for this specific query:
        " . ($additional_info ? $additional_info : "Use general knowledge about DigiCoders (Industrial Training, Summer Training, Apprenticeship, Web/App Development).") . "
        
        Detailed Instructions:
        1. Tone: Be extremely natural, conversational, and human-like. Don't sound like a robot or just a search result.
        2. Language: Use friendly 'Hinglish' (the way we talk in India).
        3. Delivery: Instead of just listing facts, talk like a helpful counselor who cares about the student's career. Use phrases like 'Dekho bhai/behen', 'Bilkul sahi sawaal pucha aapne', 'Main aapko guide karta hoon'.
        4. Structure: Use a mix of paragraphs and bullet points so it feels like a real chat.
        5. No Truncation: Complete your thoughts fully.
        6. Call to Action: End with a warm invitation to meet for tea/coffee and counseling at our office.
        
        Maximum length: Provide a satisfyingly long and natural response that covers everything properly.";

        $response = $this->call_gemini_api($context, $user_message);

        // 3. Log Chat
        $lead_id = $this->session->userdata('ai_lead_id');
        $source = $this->input->post('source') ? $this->input->post('source') : 'text';

        $log_data = [
            'lead_id' => $lead_id,
            'user_message' => $user_message,
            'bot_reply' => $response,
            'source' => $source,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('chat_logs', $log_data);

        echo json_encode(['status' => 'success', 'reply' => $response, 'source' => $source]);
    }

    private function call_gemini_api($system_prompt, $user_message)
    {
        if ($this->api_key === 'YOUR_GEMINI_API_KEY_HERE') {
            return "Bhai, please set your Gemini API Key in application/controllers/AiAssistant.php to enable AI answers.";
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=" . $this->api_key;

        $data = [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        ["text" => $system_prompt . "\n\nUser Question: " . $user_message]
                    ]
                ]
            ],
            "generationConfig" => [
                "temperature" => 0.9,
                "maxOutputTokens" => 2048,
            ]
        ];

        $max_retries = 2;
        $retry_count = 0;

        while ($retry_count <= $max_retries) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);

            if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                return $result['candidates'][0]['content']['parts'][0]['text'];
            }

            // If high demand error, wait a bit and retry
            if (isset($result['error']['message']) && strpos($result['error']['message'], 'high demand') !== false && $retry_count < $max_retries) {
                $retry_count++;
                sleep(2); // Wait 2 seconds before retry
                continue;
            }

            if (isset($result['error']['message'])) {
                return "API Error: " . $result['error']['message'];
            }

            break;
        }

        return "I am having trouble connecting to the brain. Please try again.";
    }
}


