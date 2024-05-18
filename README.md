![Demo GIF](https://github.com/HasanBeker2/hasanbeker.com-AI-Virtual-Assistant/blob/main/hasanbeker.com%20gif.gif)



# AI-Powered Chatbot for WordPress

## Introduction
In this project, I generated an AI-powered chatbot on WordPress like the one on my portfolio website, [hasanbeker.com](https://hasanbeker.com). This chatbot is designed to provide information about me, Hasan Beker, and it is built from scratch without using any third-party services or plugins. 

## Features
- **Online Status**: Displays the chatbot's availability.
- **System Message**: A customizable initial greeting message.
- **Avatar Image**: Customizable user and bot avatars.
- **Memory**: The chatbot remembers past conversations.
- **Custom Commands**: Predefined prompts to assist users quickly.


## How to Create the Chatbot

### Step 1: Prepare the Chatbot UI
1. **Create the UI Files**:
   - `index.html`: The main HTML file for the chatbot interface.
   - `styles.css`: The CSS file for styling the chatbot.
   - `scripts.js`: The JavaScript file to handle chatbot interactions.
   - `config.php`: php file for backend
   - 
2. **Test Locally**:
   - Open the `index.html` file in a browser to ensure the chatbot loads and functions correctly.

### Step 2: Set Up the Backend on WordPress
1. **Install WP Code Snippet Plugin**:
   - Go to your WordPress dashboard, navigate to Plugins, and install the "WP Code Snippet" plugin.

2. **Create Code Snippet**:
   - Paste the PHP code snippet config in the plugin to handle AI responses, dummy responses for testing, and chatbot requests.
   - Customize the bot's base configurations (status, startup message, avatar URL, and commands).

### Step 3: Add Information About Hasan Beker
1. **System Prompt Configuration**:
   - In the backend code snippet, add a system prompt to provide specific information about Hasan Beker.
   - Example prompt: "Provide information about Hasan Beker, including his background, skills, and experience as detailed in his CV."

### Step 4: Connect UI and Backend
1. **Update the URLs**:
   - Modify the URLs in the `scripts.js` file to point to your WordPress site.

2. **Test the Connection**:
   - Open the `index.html` file again and verify that the chatbot communicates with the backend correctly.

### Step 5: Publish the Chatbot on WordPress
1. **Create a New Page**:
   - In your WordPress dashboard, create a new page for the chatbot.

2. **Add Custom HTML Block**:
   - Paste the contents of `index.html` into a custom HTML block.
   - Include the CSS and JavaScript code directly within the page using the `<style>` and `<script>` tags.

### Step 6: Customize and Enhance
1. **Customize Appearance and Commands**:
   - Modify the chatbot's configurations in the code snippet as needed.

2. **Advanced Features**:
   - Implement advanced features like system prompts to restrict topics, integrate the chatbot with specific documents using RAG (Retrieval-Augmented Generation), and create AI agents that perform tasks.

## Conclusion
By following these steps, you can create a fully functional, customizable AI chatbot for your WordPress site that provides detailed information about Hasan Beker. This project showcases the potential of AI in enhancing customer interactions and automating support tasks. If you found this guide helpful, please star this repository and follow my channel for more AI and automation tutorials.



---

If you have any questions or need further assistance, feel free to reach out. You can test the chatbot link below.


[hasanbeker.com](https://hasanbeker.com/chatbot/)


