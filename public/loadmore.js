document.addEventListener('click', function (e) {
    if(e.target && e.target.id === 'load-more-button') {
        const button = e.target;
        const url = button.getAttribute('data-url');
        const containerId = button.getAttribute('data-container');
        const container = document.getElementById(containerId);

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;

            // Get the new post HTML
            const newContent = tempDiv.querySelector('#loadmore-content');
            const newButtonWrapper = tempDiv.querySelector('#loadmore-button-wrapper');
            const oldButtonWrapper = document.getElementById('loadmore-button-wrapper');
            
            // Append new content to container
            if(newContent) {
                container.insertAdjacentHTML('beforeend', newContent.innerHTML);
            }

            // Replace Load More button
            if(oldButtonWrapper) {
                if(newButtonWrapper) {
                    oldButtonWrapper.innerHTML = newButtonWrapper.innerHTML;
                } else {
                    oldButtonWrapper.remove();
                }
            }
        });
    }
})