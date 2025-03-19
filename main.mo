actor Main {
    // Function to greet a user
    public func greet(name: Text): async Text {
        return "Hello, " # name # "!";
    };

    // Function to simulate database connection (example)
    public func connectDb(): async Text {
        // Simulate a database connection
        return "Connected to the database successfully.";
    };

    // Function to close the database connection (example)
    public func closeDb(): async Text {
        // Simulate closing the database connection
        return "Database connection closed.";
    };
}