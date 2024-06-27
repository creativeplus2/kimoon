class BlockSlideshow {
    static get toolbox() {
        return {
            title: 'Block Slideshow',
            icon: '<svg width="17" height="15" viewBox="0 0 336 276" xmlns="http://www.w3.org/2000/svg"><path d="M291 150V79c0-19-15-34-34-34H79c-19 0-34 15-34 34v42l67-44 81 72 56-29 42 30zm0 52l-43-30-56 30-81-67-66 39v23c0 19 15 34 34 34h178c17 0 31-13 34-29zM79 0h178c44 0 79 35 79 79v118c0 44-35 79-79 79H79c-44 0-79-35-79-79V79C0 35 35 0 79 0z"/></svg>'
        };
    }
  
    constructor({data}){
        this.data = data;
        this.wrapper = undefined;
    }


    render(){

        this.wrapper = document.createElement('div');
        const slide = document.createElement('div');
        slide.classList.add('slide');

        const title = document.createElement('input');
        const image = document.createElement('input');
        const subtitle = document.createElement('input');
        this.wrapper.classList.add('slides', 'block');

        const button = document.createElement('button');
        button.setAttribute("type", "button");
        button.setAttribute("name", "add");
        button.innerHTML = 'add slide';

        const buttondelete = document.createElement('button');
        buttondelete.setAttribute("type", "button");
        buttondelete.setAttribute("name", "delete");
        buttondelete.setAttribute("onclick", "return this.parentNode.remove()");
        buttondelete.classList.add('buttondelete');
        buttondelete.innerHTML = 'delete';
        
        this._createInputForm(title, 'title', 'Title', slide);
        this._createInputForm(subtitle, 'subtitle', 'Subtitle', slide);
        this._createImageForm(image, 'image', 'Image Main', slide);
        button.onclick = function() {
            const wrapper2 = document.querySelector(".slides");
            const clone = slide.cloneNode(true);

            wrapper2.appendChild(clone);
        }

        slide.appendChild(buttondelete);
        this.wrapper.appendChild(button);

        if(this.data.slideshow ){
            for (let i = 0; i < this.data.slideshow.length; i++) {
                const clone = slide.cloneNode(true);
                this.wrapper.appendChild(clone);
                clone.querySelector(".title").value =  this.data.slideshow[i].title;
                clone.querySelector(".subtitle").value =  this.data.slideshow[i].subtitle;
                clone.querySelector(".image").value = this.data.slideshow[i].image;
                this._createImage(this.data.slideshow[i].image , clone.querySelector('.wrapperimage'));
                
                clone.querySelector(".image").addEventListener('change', (event) => {
                    clone.querySelector('.wrapperimage').querySelector('img').remove();
                    this._createImage(event.target.value, event.target.parentNode);
                });
            }
        }
        // document.addEventListener("DOMNodeInserted", function (evt) {
        //     const slides = document.querySelectorAll('.slide');
        //     for (let i = 0; i < slides.length; i++) {
        //         const image = slides[i].querySelector(".image");
        //         const wrapperimage = slides[i].querySelector(".wrapperimage")
        //         image.addEventListener('change', () => {
        //             // wrapperimage.querySelector('img').remove();
        //             const image2 = document.createElement('img');  
        //             image2.src = 'http://127.0.0.1:8000'+ image.value;
        //             wrapperimage.appendChild(image2);
        //         });
        //         console.log(image.value)

        //     }
        // }, false);

        return this.wrapper;
    }

    _createInputForm(name, title, placeholder, wrapper){
        const label = document.createElement('label');
        label.innerHTML = placeholder;
        name.setAttribute("class", title);
        name.placeholder = placeholder;
        const wrapperinput = document.createElement('div');
        wrapperinput.setAttribute("class", 'wrapperinput');
        wrapperinput.appendChild(label);
        wrapperinput.appendChild(name);
        wrapper.appendChild(wrapperinput);
    }

    _createImage(url, wrapperimage){
        const image = document.createElement('img');  
        image.src = window.location.origin+ url;
        wrapperimage.appendChild(image);
    }
  
    _createImageForm(name, title, placeholder, wrapper){

        const label = document.createElement('label');
        label.innerHTML = placeholder;
  
        name.setAttribute("class", title);

        const link = document.createElement('a');
        link.setAttribute("class",'imagepop' )
        link.setAttribute("data-input",title  )
        link.setAttribute("preview",'holder' )
        link.classList.add("btn","btn-primary","text-white");
        link.innerHTML = "choose";
        const wrapperimage = document.createElement('div');
        wrapperimage.setAttribute("class", 'wrapperimage');
        const wrapperinput = document.createElement('div');
        wrapperinput.setAttribute("class", 'wrapperinput');
        wrapperinput.appendChild(label);
        wrapperimage.appendChild(link);
        wrapperimage.appendChild(name);


        wrapperinput.appendChild(wrapperimage)
        wrapper.appendChild(wrapperinput);

    }
  
    save(blockContent){
        const slides = blockContent.querySelectorAll(".slide");
        const objects = [];
        for (let i = 0; i < slides.length; i++) {
            objects.push({
                title : slides[i].querySelector(".title").value,
                subtitle : slides[i].querySelector(".subtitle").value,
                image : slides[i].querySelector(".image").value
            })  
        }

        return {
            slideshow: objects
        }  

    }
  }