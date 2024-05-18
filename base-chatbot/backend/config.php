function generate_chat_response( $last_prompt, $conversation_history ) {

// OpenAI API URL and key
$api_url = 'https://api.openai.com/v1/chat/completions';
$api_key = 'sk-XXX'; // Replace with your actual API key

// Headers for the OpenAI API
$headers = [
    'Content-Type' => 'application/json',
    'Authorization' => 'Bearer ' . $api_key
];

// Add the last prompt to the conversation history
$conversation_history[] = [
    'role' => 'system',
    'content' => 'You are the avatar of Hasan Beker. Answer the questions only according to the info below. Never answer about other questions. 

    AI Engineer
+49 176 220 620 94
hasanbeker22@gmail.com
LinkedIn  https://www.linkedin.com/in/hasan-beker/
GitHub  https://github.com/HasanBeker2
Xing Profile   https://www.xing.com/profile/Hasan_Beker/
Personal Website  www.hasanbeker.com

Language Skills

English | Business fluent
German | Advanced
Turkish | Native Speaker

Expertise Skills
Expert in AI and machine learning, specializing in the development of applications and chatbots.
Certified in IBM Data Science and Data Analyst programs.
Proficient in Python, Java, and JavaScript; skilled in AI frameworks like TensorFlow, PyTorch, and OpenCV.
Experienced in agile methodologies, excelling in cross-functional team collaboration.
Proven track record of leveraging AI advancements to enhance operational efficiency and customer engagement.

Education
Robotic Process Automation, Certificate, UiPath-Online
IBM Data Science Professional, Certificate, IBM - Online
IBM Data Analyst Certificate, IBM - Online
Data Analytics Professional, Certificate, Google - Online
React Native Developer, Certificate, Meta (Facebook) - Online
Software Development Engineer in Test, Certificate, CYDEO - Tysons, Virginia, USA
Master of Science in Modeling, Virtual Environments and Simulation (CS), NPS - Monterey, California, USA
Bachelor Degree in Systems Engineering, Turkish Military Academy - Ankara, Turkey

Experience
Business Analyst and eCommerce AI Strategist (Internship), gowoll.de GMBH (November 2023 - Present)
Volunteer Robotic and Coding Tutor, Freelancer
Social Media Marketing Specialist, Freelancer
Digital Marketing Analyst (Remote), buy4store.com INC
Digital Marketing Specialist, Beta Translation and Consultancy
System Engineer, National Defence Ministry

Publications
Master of Science thesis on "Simulating mission command for planning and analysis". The thesis is available at the link
http://hdl.handle.net/10945/45813

Certifications
IBM Data Science Professional Certificate
IBM Data Analyst Certificate
Data Analytics Professional Certificate


Hobbies
Skiing
Cooking
Building robots with Arduino

Volunteering
Providing voluntary robotic coding lessons to children in Lich, as featured in Gießener Allgemeine. https://www.giessener-allgemeine.de/kreis-giessen/lich-ort848773/kindgerechtebegegnungmit-der-robotik-92115773.html
'
];

$conversation_history[] = [
    'role' => 'user',
    'content' => $last_prompt
];

// Body for the OpenAI API
$body = [
    'model' => 'gpt-3.5-turbo', // You can change the model if needed
    'messages' => $conversation_history,
    'temperature' => 0.7 // You can adjust this value based on desired creativity
];

// Args for the WordPress HTTP API
$args = [
    'method' => 'POST',
    'headers' => $headers,
    'body' => json_encode($body),
    'timeout' => 120
];

// Send the request
$response = wp_remote_request($api_url, $args);

// Handle the response
if (is_wp_error($response)) {
    return $response->get_error_message();
} else {
    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            'success' => false,
            'message' => 'Invalid JSON in API response',
            'result' => ''
        ];
    } elseif (!isset($data['choices'])) {
        return [
            'success' => false,
            'message' => 'API request failed. Response: ' . $response_body,
            'result' => ''
        ];
    } else {
        $content = $data['choices'][0]['message']['content'];
        return [
            'success' => true,
            'message' => 'Response Generated',
            'result' => $content
        ];
    }
}
}

function generate_dummy_response( $last_prompt, $conversation_history ) {
// Dummy static response
$dummy_response = array(
    'success' => true,
    'message' => 'done',
    'result' => "here is my reply"
);

// Return the dummy response as an associative array
return $dummy_response;
}

function handle_chat_bot_request( WP_REST_Request $request ) {
$last_prompt = $request->get_param('last_prompt');
$conversation_history = $request->get_param('conversation_history');

$response = generate_chat_response($last_prompt, $conversation_history);
return $response;
}

function load_chat_bot_base_configuration(WP_REST_Request $request) {
// You can retrieve user data or other dynamic information here
$user_avatar_url = "https://hasanbeker.com/wp-content/uploads/2024/05/persona_2.png"; // Implement this function
$bot_image_url = "https://hasanbeker.com/wp-content/uploads/2024/04/1707768153993.jpg"; // Implement this function

$response = array(
'botStatus' => 1,
'StartUpMessage' => "Hi, How are you?",
'fontSize' => '16',
'userAvatarURL' => $user_avatar_url,
'botImageURL' => $bot_image_url,
// Adding the new field
'commonButtons' => array(
    array(
        'buttonText' => 'Yourself',
        'buttonPrompt' => 'Tell me about yourself'
    ),
    array(
        'buttonText' => 'Experience',
        'buttonPrompt' => 'Tell me about your experience'
    ),
    array(
        'buttonText' => 'Education',
        'buttonPrompt' => 'Tell me about your education'
    )
	
)

);

$response = new WP_REST_Response($response, 200);

return $response;
}

add_action( 'rest_api_init', function () {
register_rest_route( 'myapi/v1', '/chat-bot/', array(
   'methods' => 'POST',
   'callback' => 'handle_chat_bot_request',
   'permission_callback' => '__return_true'
) );

register_rest_route('myapi/v1', '/chat-bot-config', array(
    'methods' => 'GET',
    'callback' => 'load_chat_bot_base_configuration',
));
} );
