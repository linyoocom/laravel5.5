#include <iostream>
/**#include <windows.h>**/

#include <cstdio>
#include <cstdlib>
#include <unistd.h>
#include <linux/fb.h>
/*#include <linux/kd.h>
#include <sys/types.h>
#include <sys/stat.h>*/
#include <fcntl.h>
#include <sys/mman.h>
#include <sys/ioctl.h>
#include <cstring>

struct fb_var_screeninfo vinfo;
struct fb_fix_screeninfo finfo;

int main() {
    std::cout << "Hello, World!" << std::endl;
    puts("kkkkkk");
    //CaptureImage();
    int fbfd = 0;
    long int screensize = 0;
    char *fbp = nullptr;
    int x = 0, y = 0;
    long int location = 0;
    int sav=0;
    /* open device*/
    fbfd = open("/dev/fb0", O_RDWR);
    if (fbfd < 0) {
        printf("Error: cannot open framebuffer device.\n");
        perror("open");
        exit(1);
    }
    printf("The framebuffer device was opened successfully.\n");

    /* Get fixed screen information */
    if (ioctl(fbfd, FBIOGET_FSCREENINFO, &finfo) == -1) {
        printf("Error reading fixed information.\n");
        perror("ioctl");
        exit(2);
    }

    /* Get variable screen information */
    if (ioctl(fbfd, FBIOGET_VSCREENINFO, &vinfo) == -1) {
        printf("Error reading variable information.\n");
        exit(3);
    }

    /* show these information*/
    printf("vinfo.xres=%d\n",vinfo.xres);
    printf("vinfo.yres=%d\n",vinfo.yres);
    printf("vinfo.bits_per_bits=%d\n",vinfo.bits_per_pixel);
    printf("vinfo.xoffset=%d\n",vinfo.xoffset);
    printf("vinfo.yoffset=%d\n",vinfo.yoffset);
    printf("finfo.line_length=%d\n",finfo.line_length);
    printf("vinfo.red.offset=%d\n",vinfo.red.offset);
    printf("vinfo.red.length=%d\n",vinfo.red.length);
    printf("vinfo.green.offset=%d\n",vinfo.green.offset);
    printf("vinfo.green.length=%d\n",vinfo.green.length);
    printf("vinfo.blue.offset=%d\n",vinfo.blue.offset);
    printf("vinfo.blue.length=%d\n",vinfo.blue.length);

    /* Figure out the size of the screen in bytes */
    screensize = vinfo.xres * vinfo.yres * vinfo.bits_per_pixel / 8;
    /* Map the device to memory */
    fbp = (char *)mmap(nullptr, screensize, PROT_READ | PROT_WRITE, MAP_SHARED,fbfd, 0);
    if ((intptr_t)fbp == -1) {
        printf("Error: failed to map framebuffer device to memory.\n"); exit(4);
    }
    printf("The framebuffer device was mapped to memory successfully.\n");

    memset(fbp,0,screensize);
    /* Where we are going to put the pixel */
    for(x=0;x<vinfo.xres;x++)
        for(y=0;y<vinfo.yres;y++)
        {
            location = (x+vinfo.xoffset) * (vinfo.bits_per_pixel/8) +
                       (y+vinfo.yoffset) * finfo.line_length;
            *(fbp + location) = 0xff; /*  blue */
            *(fbp + location + 1) = 0x00;
        }
    munmap(fbp, screensize);  /* release the memory */
    close(fbfd);
    return 0;
}