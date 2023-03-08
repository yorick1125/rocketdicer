import openai

# replace "YOUR_API_KEY" with your OpenAI API key
openai.api_key = "YOUR_API_KEY"

def generate_response(prompt):
    completions = openai.Completion.create(
        engine="text-davinci-002",
        prompt=prompt,
        max_tokens=1024,
        n=1,
        stop=None,
        temperature=0.5,
    )

    message = completions.choices[0].text
    return message

while True:
    prompt = input("You: ")
    response = generate_response(prompt)
    print("Virtual Assistant: " + response)
