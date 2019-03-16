phpize && \
./configure && \
make clean && make && make install

echo "" > /tmp/xh.start
echo "" > /tmp/xh.finish
pkill -o -USR2 php-fpm
md5sum /usr/local/lib/php/extensions/no-debug-non-zts-20160303/tideways_xhprof.so
