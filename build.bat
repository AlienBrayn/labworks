git clone https://github.com/AlienBrayn/labworks.git labworks
git clone https://github.com/rok9ru/trpo-core.git labworks/core
.>labworks/version
cd labworks
git symbolic-ref --short -q HEAD > version
pause