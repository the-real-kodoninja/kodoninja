import pyodide

def hello_world():
    print("Hello, world!")

if __name__ == "__main__":
    py = pyodide.get_global()
    py.runString(hello_world.__code__.to_source(), 'console.log')