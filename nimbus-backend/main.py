from fastapi import FastAPI, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel

app = FastAPI()

# Allow CORS for Kodoninja (localhost:8000)
app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:8000"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Define the request model
class MessageRequest(BaseModel):
    message: str
    context: str = ""  # Optional context (e.g., "blog", "forum", "goal")

# Simple response logic (placeholder for now)
def generate_response(message: str, context: str) -> str:
    if context == "blog":
        return f"Nimbus.ai: I can help with your blog post! Here's a suggestion based on your input: '{message}'. How about starting with an engaging question to hook your readers?"
    elif context == "forum":
        return f"Nimbus.ai: Let's craft a forum post. Based on your input: '{message}', I suggest adding a call-to-action to encourage discussion. What do you think?"
    elif context == "goal":
        return f"Nimbus.ai: I can help with your goal! For '{message}', let's break it down into smaller, actionable steps. How about setting a timeline?"
    else:
        return f"Nimbus.ai: I received your message: '{message}'. How can I assist you today?"

@app.post("/api/nimbus")
async def nimbus_endpoint(request: MessageRequest):
    try:
        response = generate_response(request.message, request.context)
        return {"response": response}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8001)
