class SimpleImage {
    static get toolbox() {
      return {
        title: 'Simple Image',
        icon: '<svg width="17" height="15" viewBox="0 0 336 276" xmlns="http://www.w3.org/2000/svg"><path d="M291 150V79c0-19-15-34-34-34H79c-19 0-34 15-34 34v42l67-44 81 72 56-29 42 30zm0 52l-43-30-56 30-81-67-66 39v23c0 19 15 34 34 34h178c17 0 31-13 34-29zM79 0h178c44 0 79 35 79 79v118c0 44-35 79-79 79H79c-44 0-79-35-79-79V79C0 35 35 0 79 0z"/></svg>'
      };
    }
  
    constructor({data}){
      this.data = data;
    }
  
    render(){
      const wrapper = document.createElement('div');
      const url = document.createElement('input');
      url.setAttribute("id", "url");
      const text = document.createElement('input');
      text.setAttribute("id", "text");

      wrapper.classList.add('simple-image');
      wrapper.appendChild(url);
      wrapper.appendChild(text);
  
      url.placeholder = 'Paste an image URL...';
      url.value = this.data && this.data.url ? this.data.url : '';
      text.placeholder = 'Paste an image URL...';
      text.value = this.data && this.data.url ? this.data.url : '';
      return wrapper;
    }
  
    save(blockContent){
      const url = blockContent.querySelector('#url');
      const text = blockContent.querySelector('#text');

      return {
        url: url.value,
        text: text.value
      }
    }
  }