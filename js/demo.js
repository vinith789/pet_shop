console.log("Welcome to the Legal Chatbot!");
process.stdin.resume();
process.stdin.setEncoding('utf-8');

process.stdin.on('data', function (userQuery) {
    userQuery = userQuery.trim();
    if (userQuery.toLowerCase() === "exit") {
        console.log("Legal Chatbot exiting. Goodbye!");
        process.exit();
    } else {
        let botResponse = getLegalResponse(userQuery);
        console.log("Legal Chatbot: " + botResponse);
    }
});

function getLegalResponse(userQuery) {
    // Logic for generating legal response goes here
    return "I am a basic Legal Chatbot. I'm still learning!";
}