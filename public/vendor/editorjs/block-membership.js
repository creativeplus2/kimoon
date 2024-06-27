class BlockMembers {
    static get toolbox() {
        return {
            title: 'Block Membership',
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

        const type = document.createElement('input');
        const slug = document.createElement('input');
        const price = document.createElement('input');
        const pricediscount = document.createElement('input');
        const list = document.createElement('textarea');

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
        
        this._createInputForm(type, 'type', 'Type', slide);
        this._createInputForm(slug, 'slug', 'slug', slide);
        this._createInputForm(price, 'price', 'Price', slide);
        this._createInputForm(pricediscount, 'pricediscount', 'Price discount', slide);
        this._createInputForm(list, 'list', 'List', slide);

        button.onclick = function() {
            const wrapper2 = document.querySelector(".slides");
            const clone = slide.cloneNode(true);

            wrapper2.appendChild(clone);
        }

        slide.appendChild(buttondelete);
        this.wrapper.appendChild(button);

        if(this.data.members ){
            for (let i = 0; i < this.data.members.length; i++) {
                const clone = slide.cloneNode(true);
                this.wrapper.appendChild(clone);
                clone.querySelector(".type").value =  this.data.members[i].type;
                clone.querySelector(".slug").value =  this.data.members[i].slug;
                clone.querySelector(".price").value =  this.data.members[i].price;
                clone.querySelector(".pricediscount").value =  this.data.members[i].pricediscount;
                clone.querySelector(".list").value =  this.data.members[i].list;

            }
        }


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

  
    save(blockContent){
        
        const slides = blockContent.querySelectorAll(".slide");
        const objects = [];
        for (let i = 0; i < slides.length; i++) {
            objects.push({
                type : slides[i].querySelector(".type").value,
                slug : slides[i].querySelector(".slug").value,
                price : slides[i].querySelector(".price").value,
                pricediscount : slides[i].querySelector(".pricediscount").value,
                list : slides[i].querySelector(".list").value.replace(/\n/g, "\\n")

            })  
        }

        return {
            members: objects
        }  

    }
  }