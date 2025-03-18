import io, sys, base64, os, shutil, socket, json, urllib.parse, re

class Base64ToPNG:
    def __init__(self, b64, __b_ndir, ___sid__y):
        self.b64 = b64
        self.__b_ndir = __b_ndir
        self.___sid__y = ___sid__y
    
    def base64_png(self):
        """Converts a base64 string to a PNG file."""

        try:
            os.makedirs(os.path.dirname(self.__b_ndir), exist_ok=True)
            chk_1 = "Directory created successfully!<br>"
        except OSError as e:
            chk_1 = f"Failed to create directory: {e} <br>"

        basename = os.path.basename(urllib.parse.urlparse(self.b64).path)
        new_filename = f"covx_{str(self.___sid__y)}-{basename}.png"

        try:
            with open(os.path.join(self.__b_ndir, new_filename), 'wb') as file:
                file.write(base64.b64decode(self.b64))
            chk_2 ="File write successful!<br>"
        except Exception as e:
            chk_2 = f"File write failed: {e} <br>"

        Full_load = f'<img class="w100" src="{self.b64}" title="b64_{new_filename}"/>'

        print(Full_load)

if __name__ == "__main__":
    base64_to_png = Base64ToPNG(sys.argv[1], sys.argv[2], sys.argv[3])
    base64_to_png.base64_png()


  