from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI()

# Enable CORS so others can access your API
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], # Allows all websites
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Sample data
books = [
    {"id": 1, "title": "The Hobbit", "author": "J.R.R. Tolkien"},
    {"id": 2, "title": "1984", "author": "George Orwell"}
]

# Define your API endpoint
@app.get("/api/books")
def get_books():
    return books
