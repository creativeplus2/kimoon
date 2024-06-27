class BlockOne {
    static get toolbox() {
      return {
        title: 'Blocks',
        icon: '<svg width="17" height="15" viewBox="0 0 336 276" xmlns="http://www.w3.org/2000/svg"><path d="M291 150V79c0-19-15-34-34-34H79c-19 0-34 15-34 34v42l67-44 81 72 56-29 42 30zm0 52l-43-30-56 30-81-67-66 39v23c0 19 15 34 34 34h178c17 0 31-13 34-29zM79 0h178c44 0 79 35 79 79v118c0 44-35 79-79 79H79c-44 0-79-35-79-79V79C0 35 35 0 79 0z"/></svg>'
      };
    }
  
    constructor({data}){
      this.data = data;
      this.wrapper = undefined;
    }

    render(){
      this.wrapper = document.createElement('div');
      this.wrapper.classList.add('block');
      const title = document.createElement('input');
      const p_id = document.createElement('textarea');
      const p_en = document.createElement('textarea');
      const image1 = document.createElement('input');
      const image2 = document.createElement('input');
      const blocktype = document.createElement("select");
      var array = ["block-one","block-two","block-three","block-four","block-title","block-form", "block-news", "block-title-simple", "block-login"];

      // this._createSelectForm(blocktype, 'blocktype', 'Select Type', array);

      array.forEach((item) => {
        var option = document.createElement("option");
        option.value = item;
        option.text = item;
        blocktype.appendChild(option);
       })
      const label = document.createElement('label');
      label.innerHTML = "Select Block Type";
      blocktype.setAttribute("id", "blocktype");
      const wrapperinput = document.createElement('div');
      wrapperinput.setAttribute("class", 'wrapperinput');
      wrapperinput.appendChild(label);
      wrapperinput.appendChild(blocktype);
      this.wrapper.appendChild(wrapperinput);
      blocktype.value = this.data && this.data['blocktype'] ? this.data['blocktype'] : '';

      blocktype.addEventListener('change', () => {
        this._selectChange(blocktype)
      });

 
      


      this._createInputForm(title, 'title', 'Title');
      this._createInputForm(p_id, 'p_id', 'Text Indonesia');
      this._createInputForm(p_en, 'p_en', 'Text English');
      this._createImageForm(image1, 'image1', 'Image Main');
      this._createImageForm(image2, 'image2', 'Image Background');

      this._selectChange(blocktype)
    
      return this.wrapper;
    }

    _selectChange(selectBlock) {
      switch (selectBlock.value) {
        case "block-login":
        case "block-news":
          this.wrapper.querySelector(".wrapperinput-title").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-p_id").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-p_en").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-image1").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-image2").style.display = "none"; 
        break;
        case "block-title-simple":
        case "block-form":
        case "block-three":
          this.wrapper.querySelector(".wrapperinput-title").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-p_id").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-p_en").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-image1").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-image2").style.display = "none";  
          break;
          case "block-one":
            this.wrapper.querySelector(".wrapperinput-title").style.display = "flex";    
            this.wrapper.querySelector(".wrapperinput-p_id").style.display = "flex";    
            this.wrapper.querySelector(".wrapperinput-p_en").style.display = "flex";    
            this.wrapper.querySelector(".wrapperinput-image1").style.display = "flex";    
            this.wrapper.querySelector(".wrapperinput-image2").style.display = "none";  
            break;
        case "block-title":
          this.wrapper.querySelector(".wrapperinput-title").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-p_id").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-p_en").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-image1").style.display = "none";    
          this.wrapper.querySelector(".wrapperinput-image2").style.display = "flex";             
          break;
        default:
          this.wrapper.querySelector(".wrapperinput-title").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-p_id").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-p_en").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-image1").style.display = "flex";    
          this.wrapper.querySelector(".wrapperinput-image2").style.display = "flex";    
      }
    }


    _createSelectForm(name, title, placeholder, array){
      array.forEach((item) => {
        var option = document.createElement("option");
        option.value = item;
        option.text = item;
        name.appendChild(option);
       })
      const label = document.createElement('label');
      label.innerHTML = placeholder;
      name.setAttribute("id", title);
      const wrapperinput = document.createElement('div');
      wrapperinput.setAttribute("class", 'wrapperinput');
      wrapperinput.appendChild(label);
      wrapperinput.appendChild(name);
      this.wrapper.appendChild(wrapperinput);
      name.value = this.data && this.data[title] ? this.data[title] : '';
    }

    _createInputForm(name, title, placeholder){
      const label = document.createElement('label');
      label.innerHTML = placeholder;
      name.setAttribute("id", title);
      name.placeholder = placeholder;
      const wrapperinput = document.createElement('div');
      wrapperinput.setAttribute("class", 'wrapperinput wrapperinput-'+ title);
      wrapperinput.appendChild(label);
      wrapperinput.appendChild(name);
      this.wrapper.appendChild(wrapperinput);
      name.value = this.data && this.data[title] ? this.data[title] : '';
    }

    _createImage(url, wrapperimage){
      
      const image = document.createElement('img');  
      image.src = 'http://127.0.0.1:8000'+ url;
      wrapperimage.appendChild(image);

    }

    _createImageForm(name, title, placeholder){
      const label = document.createElement('label');
      label.innerHTML = placeholder;

      name.setAttribute("id", title);
      const link = document.createElement('a');
      link.setAttribute("class",'imagepop' )
      link.setAttribute("data-input",title  )
      link.setAttribute("preview",'holder' )
      link.classList.add("btn","btn-primary","text-white");
      link.innerHTML = "choose";
      const wrapperimage = document.createElement('div');
      wrapperimage.setAttribute("class", 'wrapperimage');
      const wrapperinput = document.createElement('div');
      wrapperinput.setAttribute("class", 'wrapperinput wrapperinput-'+ title);
      wrapperinput.appendChild(label)
      wrapperimage.appendChild(link)
      wrapperimage.appendChild(name)
      wrapperinput.appendChild(wrapperimage)
      this.wrapper.appendChild(wrapperinput);
      name.addEventListener('change', (event) => {
        wrapperimage.querySelector('img').remove();
        this._createImage(event.target.value, wrapperimage);
      });
      
      this._createImage(this.data[title],wrapperimage);
      name.placeholder = title;
      name.value = this.data && this.data[title] ? this.data[title]  : '';
     }
  
    save(blockContent){
      const title = blockContent.querySelector('#title');
      const p_en = blockContent.querySelector('#p_en');
      const p_id = blockContent.querySelector('#p_id');
      const image1 = blockContent.querySelector('#image1');
      const image2 = blockContent.querySelector('#image2');
      const blocktype = blockContent.querySelector('#blocktype');

      return {
        blocktype: blocktype.value,
        title: title.value,
        p_en: p_en.value,
        p_id: p_id.value,
        image1: image1.value,
        image2: image2.value
      }
    }
  }
