<div class="wlion-dashboard-widget">
    <!-- Galleries -->
    <h2>Image Gallery/Slideshow/Carousel</h2>
    <p>You can change any WordPress gallery into a slideshow or carousel by simply adding the "format" attribute and setting it to "slideshow" or "carousel."
    <h3>Example shortcode</h3>
    <code>
        [gallery format="slideshow" ids="447,446,445,444,443,442,441,440"]
    </code>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>format</td>
                <td>grid, slideshow, carousel</td>
            </tr>
        </tbody>
    </table>
    <br /><hr />

    <!-- Tooltips -->
    <h2>Tooltips</h2>
    <h3>Example shortcode</h3>
    <code>
        [tooltip position="top" text="I\'m a tool tip"]Sample Tooltip[/tooltip]
    </code>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>text<br /><i>(required)</i></td>
                <td>an alphanumeric string</td>
            </tr>
            <tr>
                <td>position</td>
                <td>default, top, right, bottom, left</td>
            </tr>
        </tbody>
    </table>
    <br /><hr />

    <!-- Icons -->
    <h2>Icons</h2>
    <h3>Example shortcode</h3>
    <code>
        [icon class="fa-bars"]
    </code>
    <p><i>NOTE: No closing tag is needed (i.e., [/icon]).</i></p>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>class<br /><i>(required)</i></td>
                <td>see <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">http://fortawesome.github.io/Font-Awesome/icons/</a></td>
            </tr>
        </tbody>
    </table>
    <br /><hr />

    <!-- Accordions -->
    <h2>Accordions</h2>
    <h3>Example shortcode</h3>
    <code>
        [accordion]<br />
            [accordion-panel id="accordion-panel-1" title="Accordion 1"]Accordion Panel 1 Content[/tab]<br />
            [accordion-panel id="accordion-panel-2" title="Accordion 2"]Accordion Panel 2 Content[/tab]<br />
            [accordion-panel id="accordion-panel-3" title="Accordion 3"]Accordion Panel 3 Content[/tab]<br />
        [/accordion]
    </code>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>an alphanumeric string</td>
            </tr>
            <tr>
                <td>title<br /><i>(required)</i></td>
                <td>an alphanumeric string</td>
            </tr>
            <tr>
                <td>active</td>
                <td>yes, no</td>
            </tr>
        </tbody>
    </table>
    <br /><hr />

    <!-- Tabs -->
    <h2>Tabs</h2>
    <h3>Example shortcode</h3>
    <code>
        [tabs]<br />
            [tab id="tab-1" title="Tab 1" active="yes"]Tab 1 Content[/tab]<br />
            [tab id="tab-2" title="Tab 2"]Tab 2 Content[/tab]<br />
            [tab id="tab-3" title="Tab 3"]Tab 3 Content[/tab]<br />
        [/tabs]
    </code>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>id</td>
                <td>an alphanumeric string</td>
            </tr>
            <tr>
                <td>title<br /><i>(required)</i></td>
                <td>an alphanumeric string</td>
            </tr>
            <tr>
                <td>active</td>
                <td>yes, no<br /><i>(one tab must be set to "yes" or tabs will not function properly)</i></td>
            </tr>
        </tbody>
    </table>
    <br /><hr />

    <!-- Grid -->
    <h2>Grid &amp; Columns</h2>
    <h3>Example shortcode</h3>
    <code>
        [grid]<br />
            [columns number="4"]4 Columns[/columns]<br />
            [columns number="4"]4 Columns[/columns]<br />
            [columns number="4"]4 Columns[/columns]<br />
        [/grid]
    </code>
    <h3>Options</h3>
    <table>
        <thead>
            <tr>
                <th>Option</th>
                <th>Accepted values</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>number<br /><i>(required)</i></td>
                <td>an integer from 1 to 12<br /></td>
            </tr>
        </tbody>
    </table>
</div>
