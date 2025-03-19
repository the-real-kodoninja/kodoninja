# kodoninja
The center of the kodoverse

## Description
Kodoninja is a versatile platform designed to streamline and enhance your coding experience. It integrates multiple programming languages and offers robust solutions for various development needs.

## Languages Used
- CSS
- HTML
- Hack
- JavaScript
- PHP
- Python
- Motoko

## Running the Platform in Codespaces

### Prerequisites
- GitHub Codespaces
- Docker
- DFINITY SDK

### Steps

1. **Open Codespaces:**
   - Navigate to your repository on GitHub.
   - Click on the `Code` button.
   - Select `Open with Codespaces` and create a new Codespace.

2. **Set up Development Container:**
   - Create a `.devcontainer` directory in the root of your repository.
   - Add `devcontainer.json` and `Dockerfile` with the following content:

   ```json
   {
       "name": "PHP & PostgreSQL",
       "dockerFile": "Dockerfile",
       "settings": {},
       "extensions": [
           "felixfbecker.php-debug",
           "bmewburn.vscode-intelephense-client",
           "ms-azuretools.vscode-docker"
       ],
       "forwardPorts": [80],
       "postCreateCommand": "composer install",
       "remoteUser": "vscode"
   }
   ```

   ```dockerfile
   # See here for image contents: https://github.com/microsoft/vscode-dev-containers/tree/v0.209.0/containers/php
   FROM mcr.microsoft.com/vscode/devcontainers/php:8

   # Install PostgreSQL
   RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
       && apt-get -y install postgresql postgresql-contrib

   # Install PHP extensions
   RUN docker-php-ext-install pdo pdo_pgsql

   # Set the default command to run PostgreSQL
   CMD ["postgres"]
   ```

3. **Configure PostgreSQL:**
   - Update your PHP code to use PostgreSQL:

     ```php
     <?php
     Class __xX_cnct_x___ {
         // kodoninja
         private $SQL__pdo_1 = "pgsql:host=localhost;dbname=u825482285_kodoninja";
         private $SQL__pth_1 = "u825482285_kodoninja";
         private $SQL__pas_1 = "****************";
         // kodostore
         private $SQL__pdo_2 = "pgsql:host=localhost;dbname=u825482285_kodostore";
         private $SQL__pth_2 = "u825482285_kodoverse";
         private $SQL__pas_2 = "****************";
         //
         private $SQL__opt_x = 
         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
         //
         protected $SQL__cnt_1; 
         protected $SQL__cnt_2; 
         public function __xX_cnct_o_1___() {
             try { $this->SQL__cnt_1 = new PDO($this->SQL__pdo_1, $this->SQL__pth_1,$this->SQL__pas_1,$this->SQL__opt_x); return $this->SQL__cnt_1;  } 
             catch (PDOException $newError) { newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError); }
         }
         public function __xX_cnct_o_2___() {
             try { $this->SQL__cnt_2 = new PDO($this->SQL__pdo_2, $this->SQL__pth_2,$this->SQL__pas_2,$this->SQL__opt_x); return $this->SQL__cnt_2;  } 
             catch (PDOException $newError) { newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError); }
         }
         public function __xX_cnct_c_1___() { $this->SQL__cnt_1 = null; }
         public function __xX_cnct_c_2___() { $this->SQL__cnt_2 = null; }
     }

     $NEWcnnc_t_1x = new __xX_cnct_x___();
     $sql______dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_1___();
     $sqlo_____dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_1___(); // new
     $sqlc_____dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_c_1___();

     $sqlo_____db2___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_2___(); 
     $sqlc_____db2___xX__ = $NEWcnnc_t_1x->__xX_cnct_c_2___();
     ?>
     ```

4. **Integrate Motoko:**
   - Install DFINITY SDK:

     ```sh
     sh -ci "$(curl -fsSL https://internetcomputer.org/install.sh)"
     ```

   - Create a `motoko` directory and add a `main.mo` file:

     ```motoko
     actor Main {
         public func greet(name: Text): async Text {
             return "Hello, " # name # "!";
         };
     };
     ```

   - Create or update the `dfx.json` file:

     ```json
     {
         "canisters": {
             "motoko_example": {
                 "main": "src/motoko/main.mo",
                 "type": "motoko"
             }
         },
         "networks": {
             "local": {
                 "bind": "127.0.0.1:8000",
                 "type": "ephemeral"
             }
         },
         "version": 1
     }
     ```

   - Build and deploy the canister:

     ```sh
     dfx start --background
     dfx deploy
     ```

5. **Launch the Development Environment:**
   - Start the Codespace and wait for the container to build.
   - Access your application through the forwarded port (default is 80).

## Contributing
Feel free to open issues or pull requests. Contributions are welcome!

## License
[MIT](LICENSE)