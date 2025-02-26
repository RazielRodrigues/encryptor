# Use the base image
FROM --platform=linux/amd64 dunglas/frankenphp:static-builder

# Install busybox which includes md5sum
RUN apk add --no-cache busybox

# Create symbolic link from md5 to md5sum
RUN ln -s /bin/busybox md5

# Set working directory
WORKDIR /go/src/app/dist/app

# Copy your app files into the container
COPY . ./

# Change working directory
WORKDIR /go/src/app/

# Set environment variables and run build script
RUN EMBED=dist/app/ PHP_EXTENSIONS=ctype,iconv,pdo_sqlite ./build-static.sh
